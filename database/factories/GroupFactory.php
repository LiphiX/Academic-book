<?php

namespace Database\Factories;

use App\Models\Speciality;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        ];
    }

    public function forSpeciality(Speciality $speciality, int $number){
        return $this->state([
            "speciality_id" => $speciality->id,
            "name" => mb_strtoupper(implode('', array_map(fn($word) => mb_substr($word, 0, 1, 'UTF-8'), explode(' ', trim($speciality->name)))), 'UTF-8') . '-' . $number,
        ]);
    }
}
