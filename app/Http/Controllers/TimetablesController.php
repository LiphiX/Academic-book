<?php

namespace App\Http\Controllers;

use App\Services\TimetableService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TimetablesController extends Controller
{
    public function getStudentTimetable(Request $request){

        $user = Auth()->user()->load('person.student.group');

        $groupId = $user->person->student->group->id;

        $service = new TimetableService();
        try{
            $calendarData = $service->getTimetableByGroupId($groupId);
        }catch(ModelNotFoundException $exception){

            return response("", 404);
        }


        return view('timetables.groupTimetable', ['calendarData'=>$calendarData]);
    }

    public function getTeacherTimetable(Request $request){
        $user = Auth()->user();

        $service = new TimetableService();
    }
}
