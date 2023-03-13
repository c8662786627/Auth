<?php

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
use App\Http\Controllers\HomeController;
Route::get('/',[HomeController::class,'homePage']);


use App\Http\Controllers\UserAuthController;
Route::get('/getCSRFToken',[UserAuthController::class,'getCSRFToken']);
Route::group(['prefix'=>'user'],function(){
    Route::group(['prefix'=>'auth'],function(){
        Route::get('/sign-up',[UserAuthController::class,'signUpPage']);
        Route::post('/sign-up',[UserAuthController::class,'signUpProcess']);
        Route::get('/sign-in',[UserAuthController::class,'signInPage']);
        Route::post('/sign-in',[UserAuthController::class,'signInProcess']);
        Route::get('/sign-out',[UserAuthController::class,'signOut']);
    });
});
