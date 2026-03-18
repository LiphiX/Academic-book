<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly PersonService $personService = new PersonService,
        private readonly FacultyService $facultyService = new FacultyService,
    )
    {
    }

    public function find($teacherId){
        $teacher = Teacher::where("id", $teacherId)->first();
        if(!$teacher){
            throw new ModelNotFoundException('Teacher not found');
        }

        return $teacher;
    }

    public function create(Teacher $teacher){
        if(!$teacher) {
            throw new ModelNotFoundException('Teacher not found');
        }

        $person = $this->personService->findOrDefault($teacher->person_id);
        if(!$person){
            throw new ModelNotFoundException('Person not found');
        }

        $faculty = $this->facultyService->findOrDefault($teacher->department_id);
        if(!$faculty){
            throw new ModelNotFoundException('Faculty not found');
        }

        error_log('test');

        $teacher->save();

        return true;
    }
}
