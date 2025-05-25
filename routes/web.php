<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

//user api
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

//categories front-end api page
Route::get('/category',[CategoryController::class,'categoryPage'])->middleware([TokenVerificationMiddleware::class]);

//categories api
Route::get('/categories-list',[CategoryController::class,'categoriesList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-category',[CategoryController::class,'createCaregories'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-delete',[CategoryController::class,'categoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-by-id',[CategoryController::class,'categoryById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-update',[CategoryController::class,'categoryUpdate'])->middleware([TokenVerificationMiddleware::class]);

//customer front end api page
Route::get('/customer',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);

//customers api
Route::get('/customers-list',[CustomerController::class,'customersList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-create',[CustomerController::class,'customerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-delete',[CustomerController::class,'deleteCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-by-id',[CustomerController::class,'customerById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-update',[CustomerController::class,'customerUpdate'])->middleware([TokenVerificationMiddleware::class]);

