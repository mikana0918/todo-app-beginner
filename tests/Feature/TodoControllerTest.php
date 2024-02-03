<?php 

namespace Tests\Feature;

use App\Models\Todo;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    public function test_should_list_todos(): void
    {
        $response = $this->get('/api/todos');

        $response->assertStatus(200);
    }
}
