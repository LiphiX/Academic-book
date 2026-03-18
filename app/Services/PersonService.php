<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function Pest\Laravel\json;

class PersonService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public function find($personId){
        $person = Person::all()->where("id", $personId)->first();

        if(!$person){
            throw new ModelNotFoundException('Person not found');
        }

        return $person;
    }

    public function findOrDefault($personId){
        $person = Person::all()->where("id", $personId)->first();

        return $person;
    }

    public function isExist($id) : bool{
        $person = Person::all()
            ->where('id', $id)
            ->first();

        if(!$person){
            return false;
        }

        return true;
    }

    //CR(U)D - Update.
    public function update(Person $person){

        if(!$person || !Person::find($person->id))
            throw new ModelNotFoundException("Person not found");

        $person->save();
    }
}
