<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'receipt_date' => $this->faker->dateTimeBetween('2023-01-01', '2024-12-31'),
        ];
    }

    public function forGroup(Group $group){
        return $this->state([
            'group_id' => $group->id
        ]);
    }
}
