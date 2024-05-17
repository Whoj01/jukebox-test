<?php

namespace App\Repositories\Login;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Helpers\JwtHelper;

class LoginRepository implements LoginRepositoryInterface 
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

     /**
     * Cria um novo usuário e retorna seu token.
     *
     * @param  Request  $request
     * @return JsonResponse 
     */
    public function create(Request $request) : JsonResponse
    {
        try {
            $userCreated = $this->userRepository->create($request);
            
            if (isset($userCreated->ok) && $userCreated->ok == false) return response()->json([
                'err' => $userCreated->msg,
                'message' => 'Erro ao criar usuário!',
                'ok' => false
            ], 500);

            $jwt = JwtHelper::signJwt($userCreated);

            return response()->json([
                'token' => $jwt,
                'user' => (object) $userCreated,
                'message' => 'Usuário criado com sucesso!',
                'ok' => true
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'err' => $th->getMessage(),
                'message' => 'Erro ao criar usuário!',
                'ok' => false
            ], 500);
        } 
    }

     /**
     * Recebe os dados do usuário e verifica se o login é válido.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse
    {
        try {
            $user = $this->userRepository->login($request);
            
            $jwt = JwtHelper::signJwt($user);

            return response()->json([
                'token' => $jwt,
                'user' => $user,
                'message' => 'Usuário logado com sucesso!',
                'ok' => true
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'err' => $th->getMessage(),
                'message' => 'Erro ao logar usuário!',
                'ok' => false
            ], 500);
        }
    }

    /**
     * Faz o logout do usuário.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request) : JsonResponse
    {
        try {
            return response()->json([
                'message' => 'Usuário deslogado com sucesso!',
                'ok' => true
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'err' => $th->getMessage(),
                'message' => 'Erro ao deslogar usuário!',
                'ok' => false
            ], 500);
        }
    }
}