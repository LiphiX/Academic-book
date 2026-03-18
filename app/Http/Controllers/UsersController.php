<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Person;
use App\Models\UserAccount;
use App\Services\PersonService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

//A controller that displays all system users.
class UsersController extends Controller
{
    public function getGuests(){
        $service = new UserService();


        return view('users.guests', ['guests' => $service->getGuests(), 'groups' => Group::all()]);
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

        $person->surname = $surname;
        $person->name = $name;
        $person->patronymic = $patronymic;

        try {
            $personService->update($person);
        }catch(ModelNotFoundException $exception){
            return response("", 404);
        }

        $userService->assignAsStudent($userId, $groupId);
        error_log(json_encode($person));
    }

}
