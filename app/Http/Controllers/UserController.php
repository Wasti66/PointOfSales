<?php

namespace App\Http\Controllers;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function UserLoginPage(){
        return view('pages.auth.userLogin-page');
    }

    //backend api
    //User Registration api
    public function UserRegistration(Request $request){
        try{
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'userName' => $request->input('userName'),
                'password' => $request->input('password'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone')
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User registration successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                //'message' => $e->getMessage(),
                'message' => 'User registration failed'
            ], 500);
        }
        
    }

    //user login api
    public function UserLogin(Request $request){

        try{
            $user = User::where(function ($query) use ($request) {
                $query->where('email', $request->input('email'))
                      ->orWhere('userName', $request->input('email'));
            })
            ->where('password', $request->input('password'))->first();
    
            if($user){
    
                $token = JWTToken::createToken(
                    $request->input('email'),
                    $request->input('userName')
                );
                return response()->json([
                    'status' => 'success',
                    'message' => 'User login successfully',
                    'token' => $token
                ], 200);
    
    
            }else{
                return response()->json([
                    'status' => 'failed',
                    //'message' => $e->getMessage(),
                    'message' => 'unauthorized'
                ], 500);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
                //'message' => $e->getMessage()
            ],500);
            
        }
        
    }

    //send otp code
    function sendOtpCode(Request $request){

        try{

            $email = $request->input('email');
            $otp = rand(1000,9999);
            $count = User::where('email','=',$email)->count();
    
            if($count == 1){
                //send otp code user email
                Mail::to($email)->send(new OTPMail($otp));
                //otp code update database table
                User::where('email','=',$email)->update(['otp'=>$otp]);
                return response()->json([
                    'status' => 'success',
                    'message' => '4 digit OTP code send your email'
                ],200);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'OTP code send failed'
                ],500);
            }

        }
        catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                //'message' => 'OTP code send failed'
                'message' => $e->getMessage()
            ],500);
        }


    }
    //verify otp
    function verifyOTP(Request $request){
        
        try{

            $email = $request->input('email');
            $otp = $request->input('otp');
            $count = User::where('email','=',$email)->where('otp','=',$otp)->count();

            if($count == 1){

                //database otp update 
                User::where('email','=',$email)->update(['otp'=>'0']);

                //password reset token issue
                $token = JWTToken::createTokenSetPass($request->input('email'));
                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP code verification successfully',
                    'token' => $token
                ],200);

            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'OTP code Invalid'
                ],500);
            }

        }
        catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }

    }

    //resetPassword
    function ResetPassword(Request $request){
        try{

            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password change successfully'
            ],200);

        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                //'message' => 'OTP code send failed'
                'message' => $e->getMessage()
            ],500);
        }
        
    }

}
