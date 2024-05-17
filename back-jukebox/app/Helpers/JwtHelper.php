<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper {
    /**
     * Recebe o código jwt e retorna o payload decodificado.
     * 
     * @param string $jwt
     * @return array
     */
    public static function decodeJwt(string $jwt): array 
    {    
        $secret = env('JWT_SECRET');

        $decoded = JWT::decode($jwt, new Key($secret, 'HS256'));
        return (array) $decoded;
    }

    /**
     * Recebe um usuário de dados e retorna um jwt.
     * 
     * @param array $userCreated
     * @return string
     */
    public static function signJwt($userCreated) : string
    { 
        $secret = env('JWT_SECRET');

        $payload = [
            'data' => time(),
            'exp' => time() + 60 * 60,
            'iss' => 'jukebox',
            'sub' =>  $userCreated['id'],
            'user' => $userCreated,
        ];

        $jwt = JWT::encode($payload, $secret, 'HS256');
        return $jwt;
    }
}