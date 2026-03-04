<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\UserAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = Person::all();
        foreach ($people as $person) {
            UserAccount::factory()->forPerson($person)->create();
        }
    }
}
