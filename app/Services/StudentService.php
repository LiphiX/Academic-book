<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly PersonService $personService = new PersonService,
        private readonly GroupService $groupService = new GroupService
    )
    {}

    //Changing a student's group.
    public function assignGroup($studentId, $groupId){
        $student = Student::find($studentId);
        if(!$student)
            throw new ModelNotFoundException("Student not found");
        $group = Group::find($groupId);
        if(!$group)
            throw new ModelNotFoundException("Group not found");

        //Saving the number of modified records in a variable.
        $number = $student->update(['group_id' => $group->id]);

        return $number != 0;
    }

    public function find($id){
        $student = Student::all()
            ->where('id', $id)
            ->first();

        if(!$student){
            throw new ModelNotFoundException("Student not found");
        }

        return $student;
    }

    public function createStudent($personId, $groupId){
        $person = $this->personService->find($personId);
        $group = $this->groupService->find($groupId);

        $student = new Student();
        $student->person_id = $person->id;
        $student->group_id = $group->id;
        $student->receipt_date = date('Y-m-d');

        $student->save();
    }


}
