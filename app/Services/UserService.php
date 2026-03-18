<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserAccount;
use Cassandra\Exception\AlreadyExistsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly PersonService $personService = new PersonService,
        private readonly StudentService $studentService = new StudentService,
        private readonly TeacherService $teacherService = new TeacherService,
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
        $person = $this->personService->find($user->person_id);
        $personId = $person->id;

        if($person->student)
            throw new AlreadyExistsException("Student already exists");

        $student = new Student();
        $student->person_id = $personId;
        $student->group_id = $groupId;

        $this->studentService->create($student);

        if($user->role->name == 'guest')
            $user->role_id = Role::all()->where('name', 'student')->first()->id;

        $user->save();

        return true;
    }

    public function assignAsTeacher($userId, $facultyId)
    {
        $user = $this->find($userId);
        $person = $this->personService->find($user->person_id);

        if($person->teacher)
            throw new AlreadyExistsException("Student already exists");

        $teacher = new Teacher();
        $teacher->person_id = $person->id;
        $teacher->department_id = $facultyId;

        $this->teacherService->create($teacher);


        if($user->role->name == 'guest')
            $user->role_id = Role::all()->where('name', 'teacher')->first()->id;

        $user->save();

        $this->teacherService->create($teacher);

    }
}
