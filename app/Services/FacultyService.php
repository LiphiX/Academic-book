<?php

namespace App\Services;

use App\Models\Department;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FacultyService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function find($id){
        $faculty = Department::all()
            ->where('id', $id)
            ->first();

        if(!$faculty){
            throw new ModelNotFoundException('Faculty not found');
        }

        return $faculty;
    }

    public function findOrDefault($id){
        $faculty = Department::all()
            ->where('id', $id)
            ->first();

        return $faculty;
    }
}
