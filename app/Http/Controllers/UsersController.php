<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use App\Models\Person;
use App\Models\UserAccount;
use App\Services\PersonService;
use App\Services\UserService;
use Cassandra\Exception\AlreadyExistsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

//A controller that displays all system users.
class UsersController extends Controller
{
    public function getGuests(){
        $service = new UserService();


        return view('users.guests', ['guests' => $service->getGuests(), 'groups' => Group::all(), 'faculties' => Department::all()]);
    }

    public function loadUser(Request $request){
        $userId = $request->input('id');

        if(!$userId){
            return response(404);
        }

        $service = new UserService();
        try{
            $user = $service->find($userId);
        }
        catch(ModelNotFoundException $exception){
            return response("", 404);
        }

        return ['surname' => $user->person->surname, 'name' => $user->person->name, 'patronymic' => $user->person->patronymic, 'groups' => Group::all()];
    }

    public function saveAsStudent(Request $request, $id){
        $userId = $id;
        $surname = $request->surname;
        $name = $request->name;
        $patronymic = $request->patronymic;
        $groupId = $request->groupId;

        $personService = new PersonService();
        $userService = new UserService();

        $user = $userService->find($userId);
        $person = $user->person;

        if($person->student)
            return response("User is already student", 409);

        $person->surname = $surname;
        $person->name = $name;
        $person->patronymic = $patronymic;


        try {
            $personService->update($person);

            $userService->assignAsStudent($userId, $groupId);
        }
        catch(ModelNotFoundException $exception){
            return response("", 404);
        }
        catch(AlreadyExistsException $exception){
            return response("", 409);
        }


        return response("", 200);
    }

    public function saveAsTeacher(Request $request, $id){
        $userId = $id;
        $surname = $request->surname;
        $name = $request->name;
        $patronymic = $request->patronymic;
        $facultyId = $request->facultyId;

        $personService = new PersonService();
        $userService = new UserService();

        $user = $userService->find($userId);
        $person = $user->person;

        if($person->teacher)
            return response('User is already teacher', 409);

        $person->surname = $surname;
        $person->name = $name;
        $person->patronymic = $patronymic;

        try{
            $personService->update($person);

            $userService->assignAsTeacher($userId, $facultyId);
        }
        catch(ModelNotFoundException $exception){
            return response("", 404);
        }
        catch(AlreadyExistsException $exception){
            return response("", 409);
        }

        return response("", 200);
    }

}
