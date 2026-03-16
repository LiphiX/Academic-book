<?php

namespace App\Services;

use App\Models\Group;
use App\Models\Timetable;
use App\Models\UserAccount;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TimetableService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }


    public function getTimetableByGroupId($groupId){
        if(!Group::find($groupId))
            throw new ModelNotFoundException("Group not found");

        Timetable::with(['teacher.person', 'group', 'discipline'])
            ->where('group_id', $groupId)
            ->get()
            ->toArray();

        return Timetable::with(['teacher.person', 'group', 'discipline']);
    }
}
