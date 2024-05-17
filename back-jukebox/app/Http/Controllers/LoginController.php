<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\User\UserRepository;
use App\Repositories\Login\LoginRepositoryInterface;
use App\Helpers\JwtHelper;

class LoginController extends Controller
{   
    protected $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    /**
     * Cria um novo usuário e retorna seu token.
     *
     * @param  Request  $request
     * @return JsonResponse 
     */
    public function create(Request $request) : JsonResponse
    {
        return $this->loginRepository->create($request);
    }

    public function login(Request $request) : JsonResponse
    {
        return $this->loginRepository->login($request);
       
    }

    public function logout(Request $request) : JsonResponse
    {
        return $this->loginRepository->logout($request);
        
    }
}
