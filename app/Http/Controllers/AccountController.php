<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getProfile(){

        $user = Auth()->user();
        $user->load('person.teacher.department');
        $user->load('person.student.group.speciality.department');

        $id = Student::all()
            ->where('person_id', $user->person->id)
            ->first();

        error_log(json_encode($id));

        //error_log(json_encode($user->person->));

        return view('account.profile', ['user' => $user]);
    }
}
