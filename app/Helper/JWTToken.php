<?php

    namespace App\Helper;

    use Exception;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    class JWTToken{
        // create token
        public static function createToken($userEmail,$userName):string{
            $key = env('JWT_KEY');
            $payload = [
                'iss'=>'laravel-token',
                'iat'=>time(),
                'exp'=>time()+60*60,
                'userEmail'=>$userEmail,
                'userName'=>$userName
            ];

            return JWT::encode($payload, $key, 'HS256');

        }

        // create token using forget password
        public static function createTokenSetPass($userEmail):string{
            $key = env('JWT_KEY');
            $payload = [
                'iss'=>'laravel-token',
                'iat'=>time(),
                'exp'=>time()+60*20,
                'userEmail'=>$userEmail
            ];

            return JWT::encode($payload, $key, 'HS256');

        }

        public static function verifyToken($token):string|array{

            try{
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return [
                    'userEmail' => $decoded->userEmail ?? null,
                    'userName' => $decoded->userName ?? null
                ];
            }catch(Exception $e){
                return "unauthorized";
            }
            
        }

    }

?>