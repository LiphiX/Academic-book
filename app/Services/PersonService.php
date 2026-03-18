<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersonService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public function find($personId){
        $person = Person::where("id", $personId)->first();
        if(!$person){
            throw new ModelNotFoundException('Person not found');
        }

        return $person;
    }

    //CR(U)D - Update.
    public function update(Person $person){

        if(!$person || !Person::find($person->id))
            throw new ModelNotFoundException("Person not found");

        $person->save();
    }
}
