<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::factory(),
        ];
    }

    public function forDepartment(Department $department){
        return $this->state([
            'department_id' => $department->id,
        ]);
    }
}
