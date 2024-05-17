<?php

namespace App\Repositories\Task;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface TaskRepositoryInterface
{
    /**
     * Recebe os dados da tarefa e cria uma nova.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse;

    /**
     * Lista todas as tarefas do usuário logado.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function read(Request $request) : JsonResponse;

    /**
     * Recebe os dados da tarefa e atualiza a mesma.
     * 
     * @param Request $request, int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id) : JsonResponse;

    /**
     * Recebe o id da tarefa e deleta a mesma.
     * 
     * @param Request $request, int $id
     * @return JsonResponse
     */
    public function delete(Request $request, int $id) : JsonResponse;
}