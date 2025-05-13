<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

//backend api
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'sendOtpCode']);
Route::post('/verify-otp',[UserController::class,'verifyOTP']);
//verify token
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/userLogin',[UserController::class,'UserLoginPage']);
Route::get('/UserRegistration',[UserController::class,'UserRegistrationPage']);
Route::get('/dashboard',[UserController::class,'userDashboard']);
