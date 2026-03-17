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
    public function __construct()
    {
    }

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
}
