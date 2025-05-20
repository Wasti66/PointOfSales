<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

//backend api
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'sendOtpCode']);
Route::post('/verify-otp',[UserController::class,'verifyOTP']);
Route::post('/change-password',[UserController::class,'changePassword'])->middleware([TokenVerificationMiddleware::class]);
//verify token
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'userProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-profile',[UserController::class,'updateProfile'])->middleware([TokenVerificationMiddleware::class]);

//logout
Route::get('/logOut',[UserController::class,'logOut']);

// front end api page
Route::get('/userLogin',[UserController::class,'UserLoginPage']);
Route::get('/UserRegistration',[UserController::class,'UserRegistrationPage']);
Route::get('/sendOtp',[UserController::class,'sentOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOtpPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[UserController::class,'userDashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/setting',[UserController::class,'userChangePassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'userProfilePage'])->middleware([TokenVerificationMiddleware::class]);

