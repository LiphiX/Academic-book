<?php

namespace Database\Seeders;

use App\Models\ClassType;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\warning;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        foreach(Group::with('speciality.disciplines')->get() as $group) {
            $speciality = $group->speciality;
            if($speciality){
                $disciplines = $speciality->disciplines;
            }
            else{
                $disciplines = collect();
            }

            foreach($disciplines as $discipline) {
                $teacher = $group->speciality->department->teachers->random();
                $lection = ClassType::where('name', 'Лекционное занятие')->first();
                Lesson::factory()
                    ->forClassType($lection)
                    ->forTeacher($teacher)
                    ->forDiscipline($discipline)
                    ->forGroup($group)
                    ->create([]);
            }
        */

        foreach (Timetable::all() as $timetable) {
            Lesson::factory()->count(2)->forTimetable($timetable)->create([]);
        }
    }
}
