<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function create(Request $request) : JsonResponse
    {
        return $this->taskRepository->create($request);
    }

    public function read(Request $request) : JsonResponse
    {
        return $this->taskRepository->read($request);
    }

    public function update(Request $request, $id) : JsonResponse
    {
        return $this->taskRepository->update($request, $id);
    }

    public function delete(Request $request, $id) : JsonResponse
    {
        return $this->taskRepository->delete($request, $id);
    }
}
