<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "position" => fake()->jobTitle(),
            "office" => fake()->address(),
            "start_date" => fake()->time(),
            "age" => fake()->numberBetween(20, 50),
            "salary" => fake()->numberBetween(100, 5000),
        ];
    }
}
