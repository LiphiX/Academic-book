<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Speciality;
use Database\Factories\GroupFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groupsCount = 2;
        Speciality::all()->each(function(Speciality $speciality) use ($groupsCount) {
            for($i = 0; $i < $groupsCount; $i++){
                Group::factory()->forSpeciality($speciality, $i+1)->create();
            }
        });

    }
}
