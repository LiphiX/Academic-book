<?php

namespace Database\Factories;

use App\Models\ClassType;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('2023-01-01', '2024-12-31'),
        ];
    }

    public function forTeacher(Teacher $teacher){
        return $this->state([
           'teacher_id' => $teacher->id,
        ]);
    }

    public function forGroup(Group $group){
        return $this->state([
            'group_id' => $group->id,
        ]);
    }

    public function forDiscipline(Discipline $discipline){
        return $this->state([
            'discipline_id' => $discipline->id,
        ]);
    }

    public function forClassType(ClassType $classType){
        return $this->state([
            'class_type_id' => $classType->id,
        ]);
    }


}
