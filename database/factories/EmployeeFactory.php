<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'ic_no' => $this->faker->numerify('############'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_no' => '01' . $this->faker->numerify('########'),
            // Pilih department secara rawak daripada table sedia ada
            'dept_id' => Department::inRandomOrder()->value('department_id'),
        ];
    }
}
