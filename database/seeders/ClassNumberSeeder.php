<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_numbers')->insert([
            ['number' => 1, 'start' => '08:00:00', 'end' => '09:30:00'],
            ['number' => 2, 'start' => '09:55:00', 'end' => '011:30:00'],
            ['number' => 3, 'start' => '11:50:00', 'end' => '13:25:00'],
            ['number' => 4, 'start' => '13:45:00', 'end' => '15:20:00'],
            ['number' => 5, 'start' => '15:30:00', 'end' => '17:05:00'],
        ]);
    }
}
