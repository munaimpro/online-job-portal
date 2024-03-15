<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{

    static function CreateToken($userEmail, $userId):string{
        $key = env('JWT_KEY');

        $payload = [
            'ass' => 'JobPulse',
            'iat' => time(),
            'exp' => time()+60*60,
            'userEmail' => $userEmail,
            'userId' => $userId
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    static function CreateTokenForResetPassword($userEmail):string{
        $key = env('JWT_KEY');

        $payload = [
            'ass' => 'JobPulse',
            'iat' => time(),
            'exp' => time()+60*5,
            'userEmail' => $userEmail,
            'userId' => 0
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    static function VerifyToken($token):string|object{
        try{
            if($token){
                $key = env('JWT_KEY');
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            } else{
                return "Unauthorized";
            }
            
        } catch(Exception $e){
            return "Unauthorized";
        }
    }

}
