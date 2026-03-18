<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GroupService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function find($id){
        $group = Group::all()
            ->where('id', $id)
            ->first();

        if(!$group){
            throw new ModelNotFoundException("Group not found");
        }

        return $group;
    }

    public function findOrDefault($id){
        $group = Group::all()
            ->where('id', $id)
            ->first();

        return $group;
    }

    public function isExist($id){
        $group = Group::all()
            ->where('id', $id)
            ->first();

        if(!$group){
            return false;
        }

        return true;
    }


}
