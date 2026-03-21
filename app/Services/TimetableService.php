<?php

namespace App\Services;

use App\Dto\TimetableDTO;
use App\Models\ClassNumber;
use App\Models\Group;
use App\Models\Timetable;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ramsey\Uuid\Type\Time;
use function Laravel\Prompts\error;

class TimetableService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly GroupService $groupService = new GroupService,
        private readonly TeacherService $teacherService = new TeacherService,
    )
    {
    }


    public function getTimetableByGroupId($groupId){
        $group = $this->groupService->findOrDefault($groupId);
        if(!$group)
            throw new ModelNotFoundException("Group not found");

        //Return a ready-made collection instead of a query builder.
        $timetableRecords =  Timetable::with(['teacher.person', 'group', 'discipline', 'classNumber', 'classType'])
            ->where('group_id', $groupId)
            ->get();

        $calendarData = [];
        $weekDays = $timetableRecords
            ->pluck('dayOfWeek')
            ->unique()
            ->all();


        $classNumbers = ClassNumber::all();
        foreach($classNumbers as $pair){
            foreach($weekDays as $day){

                $record = $timetableRecords
                    ->where('dayOfWeek', $day)
                    ->where('class_number_id', $pair->id)
                    ->first();

                if($record){

                    error_log(json_encode($record->classType->name));

                    $calendarData[$pair->id][$day] = [
                        'teacher_surname' => $record->teacher->person->surname,
                        'teacher_name' => $record->teacher->person->name,
                        'teacher_patronymic' => $record->teacher->person->patronymic,
                        'class_type' => $record->classType->name,
                        'discipline' => $record->discipline->name,
                    ];

                    //error_log(json_encode($calendarData[$pair->id][$day]));
                }
            }
        }

        return $calendarData;
    }

    public function getTimetablesByTeacherId($teacherId){
        $teacher = $this->teacherService->findOrDefault($teacherId);
        if(!$teacher)
            throw new ModelNotFoundException("Teacher not found");

        //Return a ready-made collection instead of a query builder.
        $timetableRecords =  Timetable::with(['teacher.person', 'group.speciality', 'discipline', 'classNumber', 'classType'])
            ->where('teacher_id', $teacherId)
            ->get();

        $calendarData = [];
        $weekDays = $timetableRecords
            ->pluck('dayOfWeek')
            ->unique()
            ->all();


        $classNumbers = ClassNumber::all();
        foreach($classNumbers as $pair){
            foreach($weekDays as $day){

                $record = $timetableRecords
                    ->where('dayOfWeek', $day)
                    ->where('class_number_id', $pair->id)
                    ->first();

                if($record){

                    error_log(json_encode($record->classType->name));

                    $calendarData[$pair->id][$day] = [
                        'group_name' => $record->group->name,
                        'group_speciality_name' => $record->group->speciality->name,
                        'class_type' => $record->classType->name,
                        'discipline' => $record->discipline->name,
                    ];

                    //error_log(json_encode($calendarData[$pair->id][$day]));
                }
            }
        }

        return $calendarData;
    }
}
