<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helpers\JwtHelper;

class CheckToken
{
    /**
     * Verifica se o token é válido.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json([
                'message' => 'Token não informado!',
                'ok' => false
            ], 401);
        }

        $token = explode(' ', $token);
        $token = $token[1];

        if (!JwtHelper::decodeJwt($token)) {
            return response()->json([
                'message' => 'Token inválido!',
                'ok' => false
            ], 401);
        }

        return $next($request);
    }
}
