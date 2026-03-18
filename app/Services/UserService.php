<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Role;
use App\Models\Student;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly PersonService $personService = new PersonService,
        private readonly StudentService $studentService = new StudentService,
    )
    {
    }

    public function getUsers(){
        return UserAccount::all();
    }

    public function getGuests(){
        return UserAccount::all()
            ->where('role.name', 'guest');
    }

    public function getStudent(){
        return UserAccount::all()
            ->where('role.name', 'student')
            ->toArray();
    }

    public function getTeacher(){
        return UserAccount::all()
            ->where('role.name', 'teacher')
            ->toArray();
    }

    public function find($id){
        $user = UserAccount::all()
            ->where('id', $id)
            ->first();

        if(!$user){
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }

    public function assignAsStudent($userId, $groupId)
    {
        $user = $this->find($userId);
        $personId = $this->personService->find($user->id);

        $this->studentService->createStudent($userId, $groupId);

        if($user->role->name == 'guest')
            $user->role_id = Role::all()->where('name', 'student')->first()->id;

        $user->save();

        return true;
    }
}
