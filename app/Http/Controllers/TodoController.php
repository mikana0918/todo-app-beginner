<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Repositories\TodoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class TodoController extends BaseController
{
    /**
     * @param TodoRepository $todoRepository
     */
    public function __construct(private readonly TodoRepository $todoRepository) 
    {
    }

    /**
     * @return JsonResponse
     */
    public function list(): JsonResponse
    {
        $todos = $this->todoRepository->list();

        return response()->json([
            'todos' => $todos
        ]); 
    }

    /**
     * @param CreateTodoRequest $request
     * @return JsonResponse
     */
    public function create(CreateTodoRequest $request): JsonResponse
    {
        $todo = $this->todoRepository->create($request->validated());

        return response()->json([
            'todo' => $todo
        ]);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->todoRepository->delete($id);

        return response()->json([
            'message' => 'Todo deleted successfully'
        ]);
    }
}