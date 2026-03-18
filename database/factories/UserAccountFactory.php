<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAccount>
 */
class UserAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'login' => $this->faker->unique()->userName(),
            'password' => Hash::make($this->faker->password()),
        ];
    }

    public function forPerson(Person $person){

        $role = 'users';
        if($person->teacher)
            $role = 'teacher';
        else if($person->student){
            $role = 'student';
        }

        return $this->state([
           'person_id' => $person->id,
            'role_id' => Role::where('name', $role)->first()->id
        ]);
    }
}
