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
    )
    {
    }


    public function getTimetableByGroupId($groupId){
        $group = $this->groupService->findOrDefault($groupId);
        if(!$group)
            throw new ModelNotFoundException("Group not found");

        //Return a ready-made collection instead of a query builder.
        $timetableRecords =  Timetable::with(['teacher.person', 'group', 'discipline', 'classNumber'])
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

                    $calendarData[$pair->id][$day] = [
                        'teacher_surname' => $record->teacher->person->surname,
                        'teacher_name' => $record->teacher->person->name,
                        'teacher_patronymic' => $record->teacher->person->patronymic,
                        'discipline' => $record->discipline->name,
                        'discipline_id' => $record->discipline->id
                    ];
                }
            }
        }

        return $calendarData;
    }
}
