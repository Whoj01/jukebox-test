<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Cria um usuário e retorna seu token.
     * 
     * @param Request  $request
     * @return mixed
     */
    public function create(Request $request) : mixed;

    /**
     * Verifica se o login do usuário é válido
     * 
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request) : mixed;
}