<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use App\Models\Room;
use App\Models\Tourist;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class TouristController extends Controller
{
    protected $providers = [
        'facebook','google',
    ];

    function register(){
        $attributes = request()->validate([
            'email' => 'required|email|unique:tourists,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:5|max:20',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = Tourist::create($attributes);

        auth('web')->login($user);

        session()->flash('success','Account has been created !');

        return redirect("/profile");
    }

    function logout(){

        auth('web')->logout();

        return redirect("/login")->with('success','Logged out !');

    }

    function login(){
        $attributes = request()->validate([
            'email' => 'required|email|exists:tourists,email',
            'password' => 'required'
        ]);

        if(auth('web')->attempt($attributes)){
            return redirect('/profile')->with('success','Welcome again');
        }

        throw ValidationException::withMessages([
            'password' => 'Invalid Password !'
        ]);
    }

    // social login and register

    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect('/profile')->with('success','Welcome to the profile');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('social.login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = Tourist::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'image' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = Tourist::create([
                'first_name' => $providerUser->getName(),
                'last_name' => '',
                'email' => $providerUser->getEmail(),
                'image' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
            ]);
        }

        // login the user
        auth('web')->login($user);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }

    function updateProfile(){
        $user = Auth::user('web');

        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contacts' => 'required',
            'dob' => 'required|date',
            'country' => 'required',
            'zip' => 'nullable',
            'state' => 'nullable',
            'address' => 'nullable',
        ]);

        $attributes["contacts"]= [$attributes["contacts"]];

        $user->update($attributes);

        return redirect('/profile')->with('succes','Profile updated');

    }

    public function recoverLink(Request $request){

        $request->validate([
            'email' => 'required|email|exists:tourists',
        ]);

        $token = uniqid();

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('emails.pswd-reset', ['token' => 'reset/'.$token, 'email'=> $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
            $message->replyTo('contact@manakal.com', 'Manakal contact');
        });

        return redirect('/recover')->with('success','We have e-mailed your password reset link!');
    }

    public function updatePassword(Request $request){

        $request->validate([
            'password' => 'required|string|min:5|max:20|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $user = Tourist::where('email', $updatePassword->email)
                    ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

        return redirect('/login')->with('success', 'Your password has been changed!');

    }

    function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400)) + 1;
    }

    public function checkout(){
        $attributes = request()->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'packageID' => 'required',
            'room' => 'required',
        ]);

        $attributes['pkg_qty'] = $this->dateDiffInDays($attributes['startDate'], $attributes['endDate']);

        Session::put('currentBooking', $attributes);

        if(Auth::guard('web')->check()){
            return redirect('/checkout');
        }else{
            return redirect('/login');
        }
    }

    public function checkoutView(){

        $booking = Session::get('currentBooking');

        if(Auth::guard('web')->check()){
            if($booking){

                $package = Package::whereHas('profile',function (Builder $query) {
                    $query->whereNotNull('approved_by');
                })->where('id',$booking['packageID'])->first();

                $room = null;

                if($booking['room']>0){
                    $room = Room::find($booking['room']);
                }

                return view('web.checkout', compact('package','room'));
            }else{
                return redirect('/hotels');
            }
        }else{
            return redirect('/login');
        }

    }

    public function thankyou($id){

        $booking = Booking::where('id',$id)->first();

        return view('web.thankyou',[
            'booking'=>$booking,
        ]);
        
    }


}
