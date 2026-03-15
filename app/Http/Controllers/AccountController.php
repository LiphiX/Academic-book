<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getProfile(){

        $user = Auth()->user();
        if($user->person->teacher)
            $user->load('person.teacher.department');
        elseif($user->person->student)
            $user->load('person.student.group.speciality.department');

        return view('account.profile', ['user' => $user]);
    }
}
