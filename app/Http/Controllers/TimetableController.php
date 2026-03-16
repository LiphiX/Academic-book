<?php

namespace App\Http\Controllers;

use App\Services\TimetableService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function getTimetable(){

        $user = Auth()->user();
        $groupId = $user->person->student->group->id;

        $service = new TimetableService();
        try{
            $data = $service->getTimetableByGroupId($groupId);
        }catch(ModelNotFoundException $exception){
            return response(403);
        }

        return view('timetable', ['data'=>$data]);
    }
}
