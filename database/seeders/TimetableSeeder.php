<?php

namespace Database\Seeders;

use App\Models\ClassNumber;
use App\Models\Department;
use App\Models\Group;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::with('speciality.disciplines', 'speciality.department')->get();
        foreach ($groups as $group) {
            $disciplines = $group->speciality->disciplines;
            $teachers = $this->teachers($group->speciality->department->id);

            $dayLoad = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
            foreach ($disciplines as $discipline) {
                $lessonCount = rand(1, 3);
                for ($i = 0; $i < $lessonCount; $i++) {
                    $day = $this->findDay($dayLoad);
                    $classNumber = ClassNumber::all()->random();
                    if($this->isGroupBusy($group, $day, $classNumber)){
                        continue;
                    }

                    $teacher = $this->findTeacher($teachers, $day, $classNumber);
                    if($teacher){
                        Timetable::create([
                            'class_number_id' => $classNumber->id,
                            'teacher_id' => $teacher->id,
                            'group_id' => $group->id,
                            'dayOfWeek' => $day,
                            'discipline_id' => $discipline->id,
                        ]);

                        $dayLoad[$day]++;
                    }
                }
            }
        }
    }

    private function findTeacher($teachers, $day, $classNumber){
        foreach($teachers as $teacher){
            if(!$this->isTeacherBusy($teacher, $day, $classNumber)){
                return $teacher;
            }
        }

        return null;
    }

    private function findDay($load){
        asort($load);

        reset($load);
        return key($load);
    }

    private function isTeacherBusy($teacher, $day, $classNumber) : bool{
        return Timetable::where('teacher_id', $teacher->id)
            ->where('dayOfWeek', $day)
            ->where('class_number_id', $classNumber->id)
            ->exists();
    }

    private function isGroupBusy($group, $day, $classNumber) : bool{
        return Timetable::where('group_id', $group->id)
            ->where('dayOfWeek', $day)
            ->where('class_number_id', $classNumber->id)
            ->exists();
    }

    private function teachers(int $departmentId){
        $departments = Department::where('id', $departmentId)->first();

        return $departments->teachers;
    }

}
