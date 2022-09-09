<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Citie;
use App\Models\Facilitie;
use App\Models\HotelProfile;
use App\Models\HotelType;
use App\Models\HotelUser;
use App\Models\Offer;
use App\Models\Package;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HotelController extends Controller
{
    function register(){
        // var_dump(request()->all());
        $attributes = request()->validate([
            'email' => 'required|email|unique:hotel_users,email',
            'contact' => 'required|min:10',
            'username' => 'required|min:1|max:20|unique:hotel_users,username',
            'password' => 'required|confirmed|min:5|max:20',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = HotelUser::create($attributes);

        auth('hotel')->login($user);

        session()->flash('success','Account has been created !');

        return redirect("hotel-portal/");
    }

    function logout(){

        auth('hotel')->logout();

        return redirect("hotel-portal/login")->with('success','Logged out !');

    }

    function login(){
        $attributes = request()->validate([
            'email' => 'required|exists:hotel_users,email',
            'password' => 'required'
        ]);

        if(auth('hotel')->attempt($attributes)){
            return redirect('hotel-portal/')->with('success','Welcome again');
        }

        throw ValidationException::withMessages([
            'password' => 'Provided credentials not found !'
        ]);
    }

    public function loadProfile(){
        $hotel_pro_id = Auth::user('hotel')->hotel_profile_id;
        if(!$hotel_pro_id){
            return view('admin.hotel.profile',[
                "profile" => NULL,
                "types" => HotelType::all(),
                "cities" => Citie::all(),
            ]);
        }else{
            $hotel = HotelProfile::where('id',$hotel_pro_id)->first();
            return view('admin.hotel.profile',[
                "profile" => $hotel,
                "types" => HotelType::all(),
                "cities" => Citie::all(),
            ]);
        }
    }

    public function createProfile(){

        $attributes = request()->validate([
            'name' => 'required',
            'leagal_name' => 'required',
            'contacts' => 'required|min:10|max:10',
            'address' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'description' => 'required',
            'facebook_link' => 'nullable',
            'video_url' => 'nullable',
            'hotel_type_id' => 'required|numeric',
            'city_id' => 'required|numeric',
        ]);

        $images = [];
        $contacts = [$attributes["contacts"]];
        $attributes["contacts"]=$contacts;

        // upload cover images
        $imgcount=1;
        if(!empty(request()->file('images'))){
            foreach(request()->file('images') as $file)
            {
                if($file->getSize()>2621440){
                    // echo $file->getSize();
                    return back()->withInput();
                }
                if($imgcount>5){
                    return back()->withInput();
                }


                $name_cover = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('images/hotels'), $name_cover);
                $images[] = $name_cover;

                $imgcount = $imgcount+1;
            }
            $attributes["images"]=$images;
        }


        if(!empty(request()->file('logo'))){

            $file = request()->file('logo');

            if($file->getSize()>2621440){
                // echo $file->getSize();
                return back()->withInput();
            }

            $name_cover = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('images/hotels'), $name_cover);
            $attributes["logo"] = $name_cover;
        }

        $newHotel = HotelProfile::create($attributes);

        if($newHotel){
            // update user
            $user = Auth::user('hotel');
            $user->hotel_profile_id = $newHotel->id;
            $user->save();
            return redirect("hotel-portal/profile")->with('success','Profile created !');
        }else{
            return back()->withInput()->with('error','create error !');
        }

        // dd($newHotel);

        // return redirect("hotel-portal/profile")->with('success','Profile created !');

    }

    public function updateProfile(){
        $profile = HotelProfile::where('id',request()->get('id'))->first();
        if($profile){
            $attributes = request()->validate([
                'name' => 'required',
                'leagal_name' => 'required',
                'contacts' => 'required|min:10|max:10',
                'address' => 'required',
                'lat' => 'required|numeric',
                'lng' => 'required|numeric',
                'description' => 'required',
                'facebook_link' => 'nullable',
                'video_url' => 'nullable',
                'hotel_type_id' => 'required|numeric',
                'city_id' => 'required|numeric',
            ]);

            $images = [];
            $contacts = [$attributes["contacts"]];
            $attributes["contacts"]=$contacts;

            // upload cover images
            $imgcount=1;
            if(!empty(request()->file('images'))){
                //delete previous
                foreach($profile->images as $image){
                    Storage::disk('web_site_hotel_root')->delete($image);
                }

                //upload them again
                foreach(request()->file('images') as $file)
                {
                    if($file->getSize()>2621440){
                        // echo $file->getSize();
                        return back()->withInput();
                    }
                    if($imgcount>5){
                        return back()->withInput();
                    }


                    $name_cover = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('images/hotels'), $name_cover);
                    $images[] = $name_cover;

                    $imgcount = $imgcount+1;
                }
                $attributes["images"]=$images;
            }


            if(!empty(request()->file('logo'))){

                //delete previous logo
                if($profile->logo){
                    Storage::disk('web_site_hotel_root')->delete($profile->logo);
                }

                $file = request()->file('logo');

                if($file->getSize()>2621440){
                    // echo $file->getSize();
                    return back()->withInput();
                }

                $name_cover = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('images/hotels'), $name_cover);
                $attributes["logo"] = $name_cover;
            }


            $profile->update($attributes);

            return redirect("hotel-portal/profile")->with('success','Profile updated !');

        }
    }

    public function viewPackage(){
        return view('admin.hotel.packages',[
            'facilities' => Facilitie::all(),
            'beds' => Bed::all(),
            'offers' => Offer::where('hotel_profile_id',Auth::user('hotel')->hotel_profile_id)->get(),
        ]);
    }

    public function addPackage(){

        $hotel_profile=Auth::user('hotel')->hotel_profile_id;

        if($hotel_profile){

            $attributes = request()->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $attributes["total"]=0;
            $attributes["profile_id"]=$hotel_profile;

            $package = Package::create($attributes);

            return redirect("hotel-portal/edit-packege/".$package["id"])->with('success','Packege created !');

        }else{
            return redirect("hotel-portal/add-packege")->with('error','Profile not found !');
        }
    }

    // go to edit not the save function
    public function editPackage($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();
        if($package){
            return view('admin.hotel.packages',[
                'facilities' => Facilitie::all(),
                'beds' => Bed::all(),
                'offers' => Offer::where('hotel_profile_id',Auth::user('hotel')->hotel_profile_id)->get(),
                'packege' => $package,
            ]);
        }else{
            return redirect("hotel-portal/add-packege")->with('error','Packege not found !');
        }
    }

    function updatePackage($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();
        if($package){
            $attributes = request()->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $package->update($attributes);

            return redirect("hotel-portal/edit-packege/".$package["id"])->with('success','Packege updated !');

        }else{
            return redirect("hotel-portal/add-packege")->with('error','Packege not found !');
        }
    }

    function addRoom($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();
        if($package){
            $attributes = request()->validate([
                'name' => 'required',
                'bathrooms_qty' => 'required|numeric',
                'price'=> 'required|numeric',
            ]);

            $attributes["package_id"]=$id;

            $room = Room::create($attributes);

            //update total of the package
            $package->total=$package->total+$attributes["price"];
            //update main package bathrooms
            $package->bathrooms=$package->bathrooms+$attributes["bathrooms_qty"];

            $arrayOfBeds = request()->input('group-a');

            if($room && $arrayOfBeds){
                //save beds
                $beds = array();
                foreach($arrayOfBeds as $bed) {
                    $beds[] = [ 'bed_id' => $bed['bed_id'], 'room_id' => $room["id"],'capacity'=> $bed['capacity']];
                    //update main package capacity
                    $package->capacity=$package->capacity+$bed['capacity'];
                }
                DB::table('bed_room')->insert($beds);
            }

            $package->update();


            $facilitie_ids = request()->input('facilitie_id');
            // save facilities
            if($facilitie_ids){
                $facil = array();
                foreach($facilitie_ids as $facilitie_id) {
                    $facil[] = ['facilitie_id' => $facilitie_id, 'room_id' => $room["id"]];
                }
                DB::table('facilitie_room')->insert($facil);
            }


            return redirect("hotel-portal/edit-packege/".$id)->with('success','Rooms added');

        }else{
            return redirect("hotel-portal/add-packege")->with('error','Packege not found !');
        }
    }

    public function pkgList(){
        $profile = HotelProfile::where('id',Auth::user('hotel')->hotel_profile_id)->first();
        if($profile){
            return view('admin.hotel.packagelist',[
                "packages" => $profile->packeges
            ]);
        }else{
            return redirect('/hotel-portal/profile')->with('error','create profiel first');
        }

    }

    function removePackage(){
        $package = Package::where('id',request()->get('id'))->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();

        if($package ){
            $package->delete();
            return "success";
        }else{
            return "error";
        }
    }

    function saveOffer(){
        $hotel_pro_id = Auth::user('hotel')->hotel_profile_id;

        if($hotel_pro_id){

            $attributes = request()->validate([
                'name' => 'required',
                'discount' => 'required|numeric',
                'img_url'=> 'required',
                'expires_at'=> 'required|date',
            ]);

            $attributes["hotel_profile_id"]=$hotel_pro_id;

            $newOffer = Offer::create($attributes);

            return redirect("hotel-portal/add-offer")->with('success','Offer added');

        }else{
            return redirect("hotel-portal/add-offer")->with('error','Hotel Profile not found !');
        }

    }

    function editOffer($id){
        $offer = Offer::where('id',$id)->where('hotel_profile_id',Auth::user('hotel')->hotel_profile_id)->first();

        if($offer){
            return view("admin.hotel.offers",[
                "offer" => $offer,
            ]);
        }else{
            return redirect("hotel-portal/add-offer")->with('error','Offer not found !');
        }
    }

    function updateOffer($id){
        $offer = Offer::where('id',$id)->where('hotel_profile_id',Auth::user('hotel')->hotel_profile_id)->first();

         if($offer){

            $attributes = request()->validate([
                'name' => 'required',
                'discount' => 'required|numeric',
                'img_url'=> 'required',
                'expires_at'=> 'required|date',
            ]);

            $offer->update($attributes );
            return redirect("hotel-portal/add-offer/".$id)->with('success','Offer Updated');
        }else{
            return redirect("hotel-portal/add-offer")->with('error','Offer not found !');
        }
    }

    function offersList(){
        $offers = Offer::where('hotel_profile_id',Auth::user('hotel')->hotel_profile_id)->get();
        return view('admin.hotel.offerlist',[
            "offers" => $offers
        ]);
    }

    function appendOffer($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();

        if($package){

            $attributes = request()->validate([
                'offer_id' => 'required',
            ]);

            DB::table('package_offer')->insert(array([
                'offer_id' => $attributes["offer_id"],
                'package_id' => $id
            ]));

            return redirect("hotel-portal/edit-packege/".$id)->with('success','Offer added');

        }else{
            return redirect("hotel-portal/edit-packege/".$id)->with('error','No package found');
        }
    }

    function disconnectOffer($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();

        if($package){

            $attributes = request()->validate([
                'offer_id' => 'required',
            ]);

            DB::table('package_offer')->where('offer_id',$attributes["offer_id"])->where('package_id',$id)->delete();

            return redirect("hotel-portal/edit-packege/".$id)->with('success','Offer removed');

        }else{
            return redirect("hotel-portal/edit-packege/".$id)->with('error','No package found');
        }
    }

    function removeRoom($id){
        $package = Package::where('id',$id)->where('profile_id',Auth::user('hotel')->hotel_profile_id)->first();

        if($package){

            $attributes = request()->validate([
                'id' => 'required',
            ]);

            $room = Room::where('id',$attributes["id"])->where('package_id',$id)->first();

            if($room){
                $package->total = $package->total - $room->price;
                //remove bed capacity from main packege
                foreach($room->beds as $bed){
                    $package->capacity = $package->capacity - $bed->pivot->capacity;
                }
                //update bathrooms
                $package->bathrooms = $package->bathrooms - $room->bathrooms_qty;
                $package->update();
                $room->delete();
            }else{
                return redirect("hotel-portal/edit-packege/".$id)->with('error','No room found');
            }

            return redirect("hotel-portal/edit-packege/".$id)->with('success','Offer removed');

        }else{
            return redirect("hotel-portal/edit-packege/".$id)->with('error','No package found');
        }
    }

    function updateName(){
        $user = Auth::user('hotel');

        $attributes = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $user->update($attributes);

        return redirect("hotel-portal/")->with('success','Name updated');
    }

    function updatePassword(){

        $attributes = request()->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user('hotel');

        if(Hash::check( $attributes['old_password'],$user->password )){
            $attributes['password'] = bcrypt($attributes['password']);
            $user->password= $attributes['password'];
            $user->update();
            return redirect("hotel-portal/")->with('success','Password updated');
        }else{
            return redirect("hotel-portal/")->with('error','Old password error');
        }

    }

    //getting hotels
    // function gettingHotels()
    // {
    //     $data= HotelProfile::all()->toArray();
    //     return view('web.search',); WHERE approved_by= ;

    // }
    public function getHotels()
    {
        $packages = Package::whereHas('profile',function (Builder $query) {
            $query->whereNotNull('approved_by')->where("status",1);
        });

        if(isset(request()->hotel_type) && request()->hotel_type>0){
            $packages = $packages->whereHas('profile',function (Builder $query) {
                $query->where("hotel_type_id",request()->hotel_type);
            });
        }

        if(isset(request()->max_price) && request()->max_price>0){
            $packages = $packages->where('total','<=',request()->max_price);
        }

        if(isset(request()->location) && request()->location>0){
            $packages = $packages->whereHas('profile',function (Builder $query) {
                $query->where("city_id",request()->location);
            });
        }

        if(isset(request()->rooms) && request()->rooms>0){
            $packages = $packages->whereHas('rooms',function (Builder $query) {
                $query->havingRaw("count(*) >= ".request()->rooms)->groupBy('package_id');
            });
        }

        if(isset(request()->guests) && request()->guests>0){
            $packages = $packages->where('capacity','>=',request()->guests);
        }

        if(isset(request()->bathrooms) && request()->bathrooms>0){
            $packages = $packages->where('bathrooms','>=',request()->bathrooms);
        }

        if(isset(request()->facilities)){
            foreach(request()->facilities as $facility){
                $packages = $packages->whereHas('rooms',function (Builder $query) use($facility) {
                    $query->whereHas('facilities',function (Builder $query) use($facility) {
                        $query->where("id",$facility);
                    });
                });
            }
        }

        $packages = $packages->paginate(env('ITEMS_PER_PAGE'));

        //common functions
        $cities = DB::table('cities')->select('cities.*')->join('hotel_profiles', 'hotel_profiles.city_id', '=', 'cities.id')->whereNotNull('hotel_profiles.approved_by')->where('hotel_profiles.status', 1)->get();

        $min = Package::whereHas('profile',function (Builder $query) {
            $query->whereNotNull('approved_by')->where("status",1);
        })->orderBy('total', 'asc')->first();

        if($min){
            $min = $min->total;
        }else{
            $min=0;
        }

        $max = Package::whereHas('profile',function (Builder $query) {
            $query->whereNotNull('approved_by')->where("status",1);
        })->orderBy('total', 'desc')->first();

        if($max){
            $max = $max->total;
        }else{
            $max=0;
        }

        //common functions end

        return view('web.search',[
            "packages" => $packages,
            "hotel_types" => HotelType::all(),
            "facilities" => Facilitie::all(),
            "cities" => $cities,
            "min"=>$min,
            "max"=>$max,
        ]);

    }
    //packageview
    public function packageView($id)
    {
        $package = Package::whereHas('profile',function (Builder $query) {
            $query->whereNotNull('approved_by');
        })->where('id',$id)->first();

        if($package){
            return view('web.packageview',[
                "package" => $package,
            ]);
        }else{

        }
    }

    //hotel view
    public function hotelView($id)
    {
        $profile = HotelProfile::whereNotNull('approved_by')->where('id',$id)->first();

        return view('web.hotelview',[
            "profile" => $profile,
        ]);

    }

    public function recoverLink(Request $request){

        $request->validate([
            'email' => 'required|email|exists:hotel_users',
        ]);

        $token = uniqid();

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('emails.pswd-reset', ['token' => 'hotel-portal/reset/'.$token, 'email'=> $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
            $message->replyTo('contact@manakal.com', 'Manakal contact');
        });

        return redirect('/hotel-portal/recover')->with('success','We have e-mailed your password reset link!');
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

        $user = HotelUser::where('email', $updatePassword->email)
                    ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();

        return redirect('/hotel-portal/login')->with('success', 'Your password has been changed!');

    }
}
