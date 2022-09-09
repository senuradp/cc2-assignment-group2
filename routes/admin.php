<?php

use App\Http\Controllers\AdminController;

//Admin routes
Route::prefix('site-admin')->group(function () {
    Route::get('/login', function () {
        if(Auth::guard('admin')->check()){
            return redirect('/site-admin');
        }else{
            return view('admin.admin.login');
        }
    })->name('admin.login');
    Route::post('/login', [AdminController::class,'login']);


    //Admin reset
    Route::get('/recover',function(){
        return view('admin.admin.recovery-password');
    });
    Route::post('/recover',[AdminController::class,'recoverLink']);
    Route::get('/reset/{token}',function($token){
        return view('admin.admin.reset',[
            'token'=>$token,
        ]);
    });
    Route::post('/reset',[AdminController::class,'updatePasswordRecover']);
    //Admin reset end



    Route::group(['middleware'=>['auth:admin']],function(){
        Route::get('/', [AdminController::class,'pendingHotels']);
        Route::get('/logout', [AdminController::class,'logout']);
        Route::post('/reject-hotel', [AdminController::class,'rejecthotel']);
        Route::post('/approve-hotel', [AdminController::class,'approveHotel']);

        Route::post('/hotels-view', [AdminController::class,'show']);

        Route::get('/account', function () {
            return view('admin.admin.account');
        });

        Route::post('/update-name', [AdminController::class,'updateName']);
        Route::post('/update-password', [AdminController::class,'updatePassword']);

        Route::get('/create-admin', function () {
            return view('admin.admin.createadmin');
        });
        Route::post('/create-admin', [AdminController::class,'createadmin']);

        Route::get('/admin-list', [AdminController::class,'adminlist']);
        Route::post('/delete-admin', [AdminController::class,'deleteAdmin']);
        Route::post('/add-admin', [AdminController::class,'addAdmin']);

    });

});
