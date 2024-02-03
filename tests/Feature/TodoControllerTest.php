<?php 

namespace Tests\Feature;

use App\Models\Todo;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    public function test_should_list_empty_todos(): void
    {
        $response = $this->get('/api/todos');

        $response->assertStatus(200);
    }

    public function test_should_list_todos(): void
    {
        $completed_todo_1 = Todo::factory()->completed()->create();
        $completed_todo_2 = Todo::factory()->completed()->create();
        $uncompleted_todo_1 = Todo::factory()->uncompleted()->create();


        $response = $this->get('/api/todos');

        $response->assertStatus(200)->assertJsonFragment([
            'id' => $completed_todo_1->id,
            'title' => $completed_todo_1->title,
            'is_completed' => true,
        ])->assertJsonFragment([
            'id' => $completed_todo_2->id,
            'title' => $completed_todo_2->title,
            'is_completed' => true,
        ])->assertJsonFragment([
            'id' => $uncompleted_todo_1->id,
            'title' => $uncompleted_todo_1->title,
            'is_completed' => false,
        ]);
    }

    public function test_create_todo(): void
    {
        $response = $this->post('/api/todos', [
            'title' => 'New Todo',
            'is_completed' => false,
        ]);

        $response->assertStatus(200)->assertJsonFragment([
            'title' => 'New Todo',
            'is_completed' => false,
        ]);
    }

    public function test_delete_todo(): void
    {
        $todo = Todo::factory()->create();

        $response = $this->delete("/api/todos/{$todo->id}");

        $response->assertStatus(200)->assertJsonFragment([
            'message' => 'Todo deleted successfully',
        ]);
    }
}
