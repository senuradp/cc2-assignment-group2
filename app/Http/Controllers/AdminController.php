<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\HotelProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    function register()
    {
        // var_dump(request()->all());
        $attributes = request()->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:5|max:20',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = Admin::create($attributes);

        auth('admin')->login($user);

        session()->flash('success', 'Account has been created !');

        return redirect("site-admin/");
    }

    function logout()
    {

        auth('admin')->logout();

        return redirect("site-admin/login")->with('success', 'Logged out !');
    }

    function login()
    {
        $attributes = request()->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required'
        ]);

        $attributes["status"]=true;

        if (auth('admin')->attempt($attributes)) {
            return redirect('site-admin/')->with('success', 'Welcome again');
        }

        throw ValidationException::withMessages([
            'password' => 'Provided credentials not found !'
        ]);
    }

    public function pendingHotels()
    {
        $hotels = HotelProfile::where('approved_by', NULL)->get();

        return view('admin.admin.index', [
            "hotels" => $hotels

        ]);
    }

    function rejectHotel(){
        // $hotel= HotelProfile::where('hotel_type_id',request()->get('id'))->where('hotel_type_id',Auth::user('hotel'))->first();

        // if($hotel){
        //     $hotel->reject();
        //     return"success";
        // }else{
        //     return "error";
        // }
    }

    function approveHotel(){
        $attributes = request()->validate([
            'id' => 'required|numeric'
        ]);

        $hotel = HotelProfile::where('id',$attributes["id"])->first();

        if($hotel){
            $hotel->approved_by=Auth::user('admin')->id;
            $hotel->save();
            return "success";
        }else{
            return "error";
        }
    }
    function view(){
        $attributes = request()->validate([
            'id' => 'required|numeric'
        ]);

        $hotel = HotelProfile::where('id',$attributes["id"])->first();

        if($hotel){
            $hotel->approved_by=Auth::user('admin')->id;
            $hotel->save();
            return "success";
        }else{
            return "error";
        }
    }

    public function show()
    {
        $attributes = request()->validate([
            'id' => 'required|numeric'
        ]);

        $hotel = HotelProfile::where('id',$attributes["id"])->first();

        return view("admin.admin.models.profile",[
            "hotel"=>$hotel,
        ]);
        // return "error";
    }

    function updateName(){
        $user = Auth::user('admin');

        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $user->update($attributes);

        return redirect("site-admin/account")->with('success','Name updated');
    }

    function updatePassword(){

        $attributes = request()->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user('admin');

        if(Hash::check( $attributes['old_password'],$user->password )){
            $attributes['password'] = bcrypt($attributes['password']);
            $user->password= $attributes['password'];
            $user->update();
            return redirect("site-admin/account")->with('success','Password updated');
        }else{
            return redirect("site-admin/account")->with('error','Old password error');
        }

    }

    public function adminlist()
    {
        $adminlists = Admin::all();
        return view('admin.admin.adminList',[
            "adminlists" => $adminlists,

        ]);


    }

    function deleteAdmin(){
        $admin = Admin::where('id',request()->get('id'))->first();
        if($admin){
            $admin->status=false;
            $admin->save();
            return "success";
        }else{
            return "error";
        }
    }
    function addAdmin(){
        $admin = Admin::where('id',request()->get('id'))->first();
        if($admin){
            $admin->status=true;
            $admin->save();
            return "success";
        }else{
            return "error";
        }
    }

    public function createadmin(){
        $attributes = request()->validate([
            'email' => 'required|email|unique:admins,email',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $attributes['password'] = bcrypt(env('DEFAULT_ADMIN_PASSWORD'));

        $user = Admin::create($attributes);

        session()->flash('success', 'Account has been created !');

        return redirect("site-admin/create-admin");
    }


    public function recoverLink(Request $request){
        
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = uniqid();

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('emails.pswd-reset', ['token' => 'site-admin/reset/'.$token, 'email'=> $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
            $message->replyTo('contact@manakal.com', 'Manakal contact');
        });

        return redirect('/site-admin/recover')->with('success','We have e-mailed your password reset link!');
    }

    public function updatePasswordRecover(Request $request){

        $request->validate([
            'password' => 'required|string|min:5|max:20|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $user = Admin::where('email', $updatePassword->email)
                    ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

        return redirect('/site-admin/login')->with('success', 'Your password has been changed!');

    }


}

