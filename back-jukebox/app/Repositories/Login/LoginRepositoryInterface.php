<?php

namespace App\Repositories\Login;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface LoginRepositoryInterface
{
    /**
     * Recebe os dados do usuário e cria um novo usuário.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse;

    /**
     * Recebe os dados do usuário e verifica se o login é válido.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse;

    /**
     * Faz o logout do usuário.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request) : JsonResponse;
}