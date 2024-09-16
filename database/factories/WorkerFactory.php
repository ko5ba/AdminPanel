<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    protected $model = Worker::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(18, 99),
            'description' => $this->faker->text(),
            'email' => $this->faker->unique()->safeEmail(),
            'position_id' => $this->faker->randomElement(Position::pluck('id')->toArray())
        ];
    }
}
