<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\StripeController;

//Hotel routes
Route::prefix('hotel-portal')->group(function () {

    Route::get('/login', function () {
        if(Auth::guard('hotel')->check()){
            return redirect('/hotel-portal');
        }else{
            return view('admin.hotel.login');
        }
    })->name('hotel.login');
    Route::post('/login', [HotelController::class,'login']);
    Route::get('/register', function () {
        return view('admin.hotel.register');
    });

    Route::post('/register', [HotelController::class,'register']);

    //Hotel reset
    Route::get('/recover',function(){
        return view('admin.hotel.recovery-password');
    });
    Route::post('/recover',[HotelController::class,'recoverLink']);
    Route::get('/reset/{token}',function($token){
        return view('admin.hotel.reset',[
            'token'=>$token,
        ]);
    });
    Route::post('/reset',[HotelController::class,'updatePasswordRecover']);
    //Hotel reset end

    Route::group(['middleware'=>['auth:hotel']],function(){
        Route::get('/', function () {
            return view('admin.hotel.index');
        });
        Route::get('/logout', [HotelController::class,'logout']);
        Route::post('/update-name', [HotelController::class,'updateName']);
        Route::post('/update-password', [HotelController::class,'updatePassword']);

        Route::get('/profile', [HotelController::class,'loadProfile']);
        Route::post('/create-profile', [HotelController::class,'createProfile']);
        Route::post('/update-profile', [HotelController::class,'updateProfile']);

        Route::get('/add-packege', [HotelController::class,'viewPackage']);
        Route::post('/add-packege', [HotelController::class,'addPackage']);
        Route::get('/edit-packege/{id}', [HotelController::class,'editPackage']);
        Route::post('/update-packege/{id}', [HotelController::class,'updatePackage']);
        Route::post('/remove-packege', [HotelController::class,'removePackage']);
        // this id is packege id
        Route::post('add-room/{id}', [HotelController::class,'addRoom']);
        // Route::post('/update-room/{id}', [HotelController::class,'updateRoom']);
        Route::post('/remove-room/{id}', [HotelController::class,'removeRoom']);
        //this id id oackage id
        Route::post('/append-offer/{id}', [HotelController::class,'appendOffer']);
        Route::post('/disconnect-offer/{id}', [HotelController::class,'disconnectOffer']);

        // offers
        Route::get('add-offer', function(){
            return view("admin.hotel.offers");
        });
        Route::get('/add-offer/{id}', [HotelController::class,'editOffer']);
        Route::post('/add-offer', [HotelController::class,'saveOffer']);
        Route::post('/add-offer/{id}', [HotelController::class,'updateOffer']);
        Route::post('/remove-offer/{id}', [HotelController::class,'removeOffer']);

        Route::post('/create-packege', [HotelController::class,'createPackage']);
        Route::post('/add-room', [HotelController::class,'addRoom']);

        Route::get('/pkg-list', [HotelController::class,'pkgList']);

        Route::get('/offers-list', [HotelController::class,'offersList']);

        Route::get('/users-usg', function () {
            return view('admin.hotel.users');
        });
        Route::get('/users-list', function () {
            return view('admin.hotel.userlist');
        });
        Route::get('/reports', function () {
            return view('admin.hotel.reports');
        });
        Route::get('/reportslist', function () {
            return view('admin.hotel.reportslist');
        });



        // stripe
        Route::post('stripe', [StripeController::class, 'payStripe'])->name('stripe.post');

    });
});