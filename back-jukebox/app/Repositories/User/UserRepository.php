<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
     /**
     * Constante pepper para dificultar criptografia.
     */
    const PEPPER_PASS = 'jukebox';

    /**
     * Cria um novo usuário e retorna as informações.
     *
     * @param  Request  $request
     * @return mixed
     */
    public function create(Request $request) : mixed
    {
        try {
            DB::beginTransaction();

            $userPass = $request->input('password');
            $saltPass = bin2hex(random_bytes(16));
            $pepperPass = 'jukebox';

            $userPassSaltAndPepper = $userPass . $saltPass . SELF::PEPPER_PASS;

            $checkIfUserIsAlreadyOnDB = DB::table('users')  
                ->select('email')
                ->where('email', $request->input('email'))
                ->get();

            if (!$checkIfUserIsAlreadyOnDB->isEmpty()) return (object) [
                "ok" => false,
                "msg" => "Usuário já existe"
            ]; 

            $userCreated = DB::table('users')
                ->insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($userPassSaltAndPepper),
                    'salt' => $saltPass
                ]);
                    
            $returnUser = DB::table('users')
                ->select('name', 'email', 'id')
                ->where('email', $request->input('email'))
                ->first();

            DB::commit();

            $returnUser = collect((array)$returnUser);

            return $returnUser;
        } catch (\Throwable $th) {
            DB::rollback();

            return (object) [
                "ok" => false,
                "msg" => $th->getMessage()
            ];
        }
    }

    /**
     * Verifica se o login do usuário é válido
     * 
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request) : mixed 
    {
        $user = DB::table('users')
            ->select('name', 'email', 'id', 'salt', 'password')
            ->where('email', $request->input('email'))
            ->first();

        if (!$user) {
            throw new \Exception('Usuário não encontrado!');
        }

        $userPassSaltAndPepper = $request->input('password') . $user->salt . SELF::PEPPER_PASS;

        if (!Hash::check($userPassSaltAndPepper, $user->password)) {
            throw new \Exception('Senha inválida!');
        }

        $user = collect((array)$user)->except(['password', 'salt']);
        
        return $user;
    }
}