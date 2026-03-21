<?php

namespace App\Http\Controllers;

use App\Services\GroupService;
use App\Services\StudentService;
use App\Services\TimetableService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TimetablesController extends Controller
{
    public function getStudentTimetable(Request $request){

        $user = Auth()->user()->load('person.student.group');

        if(!$user->person->student)
            return response("", 404);

        $groupId = $user->person->student->group->id;

        $timetableService = new TimetableService();
        try{
            $calendarData = $timetableService->getTimetableByGroupId($groupId);
        }catch(ModelNotFoundException $exception){

            return response("", 404);
        }


        return view('timetables.groupTimetable', ['calendarData'=>$calendarData]);
    }

    public function getTeacherTimetable(Request $request){
        $user = Auth()->user()->load('person.teacher');

        if(!$user->person->teacher)
            return response("", 404);

        $teacherId = $user->person->teacher->id;

        $timetableService = new TimetableService();
        try{
            $calendarData = $timetableService->getTimetablesByTeacherId($teacherId);
         }catch(ModelNotFoundException $exception){
            return response("", 404);
        }

        return view('timetables.teacherTimetable', ['calendarData'=>$calendarData]);
    }
}
