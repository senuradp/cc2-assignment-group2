<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\ContactController;

use App\Models\Admin;
use Illuminate\Auth\Events\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/', function () {
    return view('web.index');
});


//Hotels
Route::get('/hotels',[HotelController::class,'getHotels']);


//privacy policy
Route::get('/privacypolicy', function () {
    return view('web.privacypolicy');
});

//privacy policy
Route::get('/terms-conditions', function () {
    return view('web.termsconditions');
});

//About
Route::get('/about-us', function () {
    return view('web.about');
});

//Contact
Route::get('/contact-us', function () {
    return view('web.contact');
});
Route::post('/contact-us-send',[ContactController::class,'sendContactMsg']);

//Tourist Login
Route::get('/login', function () {
    if(Auth::guard('web')->check()){
        return redirect('/profile');
    }else{
        return view('web.login');
    }
})->name('login');
Route::post('/login', [TouristController::class,'login']);

//Tourist Register
Route::get('/register', function () {
    if(Auth::guard('web')->check()){
        return redirect('/profile');
    }else{
        return view('web.register');
    }
});
Route::post('/register', [TouristController::class,'register']);

//touerist reset
Route::get('/recover',function(){
    return view('web.recover');
});
Route::post('/recover',[TouristController::class,'recoverLink']);
Route::get('/reset/{token}',function($token){
    return view('web.reset',[
        'token'=>$token,
    ]);
});
Route::post('/reset',[TouristController::class,'updatePassword']);
//touerist reset end

// social login
Route::get('oauth/{driver}', [TouristController::class,'redirectToProvider'])->name('social.oauth');
Route::get('oauth/{driver}/callback', [TouristController::class,'handleProviderCallback'])->name('social.callback');

//Tourist routes
Route::group(['middleware'=>['auth:web']],function(){
    Route::get('/profile', function(){
        return view('web.profile');
    });

    Route::post('/profile', [TouristController::class,'updateProfile']);

    Route::get('/logout', [TouristController::class,'logout']);
});

Route::get('/package/{id}',[HotelController::class,'packageView']);

Route::get('/hotel/{id}',[HotelController::class,'hotelView']);

Route::get('/checkout', [TouristController::class,'checkoutView']);

Route::post('/checkout', [TouristController::class,'checkout']);

Route::post('/booking', [BookingController::class,'booking']);

Route::post('/confirm-booking', [BookingController::class,'confirmBooking']);

Route::post('/try-payment-booking', [BookingController::class,'retryPayment']);

Route::get('/thankyou/{id}',[TouristController::class,'thankyou']);

include('hotel.php');

include('admin.php');

