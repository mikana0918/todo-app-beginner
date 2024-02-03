<?php 

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Todo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'is_completed' => fake()->boolean(),
        ];
    }

    /**
     * Indicate that the todo is completed.
     * @return mixed
     */
    public function completed()
    {
        return $this->state(fn (array $attributes) => [
            'is_completed' => true,
        ]);
    }

    /**
     * Indicate that the todo is uncompleted.
     * @return mixed
     */
    public function uncompleted()
    {
        return $this->state(fn (array $attributes) => [
            'is_completed' => false,
        ]);
    }
}
