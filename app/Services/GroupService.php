<?php

namespace App\Services;

use App\Models\Group;
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

}
