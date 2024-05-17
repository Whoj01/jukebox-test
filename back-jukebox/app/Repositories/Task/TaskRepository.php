<?php

namespace App\Repositories\Task;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Helpers\JwtHelper;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface 
{
    /**
     * Recebe os dados da task e cria uma nova.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        try {
            DB::beginTransaction();

            $token = $request->header('Authorization');
            $tokenParts = explode(' ', $token);
            $token = $tokenParts[1];

            $userLogged = JwtHelper::decodeJwt($token);

            $createdTask = DB::table('tasks')->insert([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $userLogged['sub'],
                'completed' => $request->completed ?? false
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Tarefa criada com sucesso',
                'task' => $createdTask,
                'ok' => true
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            dd($th);

            return response()->json([
                'message' => 'Erro ao criar tarefa',
                'err' => $th->getMessage(),
                'ok' => false
            ], 500);
        }
    }

    public function read(Request $request) : JsonResponse
    {
        try {
            $token = $request->header('Authorization');
            $tokenParts = explode(' ', $token);
            $token = $tokenParts[1];

            $userLogged = JwtHelper::decodeJwt($token);

            $tasks = DB::table('tasks')
                ->select('*')
                ->where('user_id', $userLogged['sub'])
                ->get();

            return response()->json([
                'message' => 'Tarefas listadas com sucesso',
                'tasks' => $tasks,
                'ok' => true
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao listar tarefas',
                'err' => $th->getMessage(),
                'ok' => false
            ], 500);
        }
    }

    public function update(Request $request, int $id) : JsonResponse
    {
        try {
            DB::beginTransaction();

            $token = $request->header('Authorization');
            $tokenParts = explode(' ', $token);
            $token = $tokenParts[1];

            $userLogged = JwtHelper::decodeJwt($token);

            $task = DB::table('tasks')->where('id', $id)->where('user_id', $userLogged['sub'])->first();

            if (!$task) {
                return response()->json([
                    'message' => 'Tarefa não encontrada',
                    'ok' => false
                ], 404);
            }

            $updatedTask = DB::table('tasks')
                    ->where('id', $id)
                    ->where('user_id', $userLogged['sub'])
                    ->update([
                        'title' => $request->input('title', $task->title),
                        'description' => $request->input('description', $task->description),
                        'completed' => $request->input('completed', $task->completed)
                    ]);

            DB::commit();

            return response()->json([
                'message' => 'Tarefa atualizada com sucesso',
                'task' => $updatedTask,
                'ok' => true
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Erro ao atualizar tarefa',
                'err' => $th->getMessage(),
                'ok' => false
            ], 500);
        }
    }

    public function delete(Request $request, int $id) : JsonResponse
    {
        try {
            DB::beginTransaction();

            $token = $request->header('Authorization');
            $tokenParts = explode(' ', $token);
            $token = $tokenParts[1];

            $userLogged = JwtHelper::decodeJwt($token);

            $task = DB::table('tasks')->where('id', $id)->where('user_id', $userLogged['sub'])->first();

            if (!$task) {
                return response()->json([
                    'message' => 'Tarefa não encontrada',
                    'ok' => false
                ], 404);
            }

            $deletedTask = DB::table('tasks')
                ->where('id', $id)
                ->where('user_id', $userLogged['sub'])
                ->delete();

            DB::commit();

            return response()->json([
                'message' => 'Tarefa deletada com sucesso',
                'ok' => true
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'message' => 'Erro ao deletar tarefa',
                'err' => $th->getMessage(),
                'ok' => false
            ], 500);
        }
    }
} 
