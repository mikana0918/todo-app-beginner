<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

interface TodoRepositoryInterface
{
    public function list();
    public function create(array $data);
    public function delete(int $id);
}

class TodoRepository implements TodoRepositoryInterface {
    /**
     * @return Collection
     */
    public function list(): Collection
    {
        return Todo::all();
    }

    /**
     * @param array $data
     * @return Todo
     */
    public function create(array $data): Todo
    {
        return Todo::create($data);
    }
    
    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return Todo::destroy($id);
    }

}