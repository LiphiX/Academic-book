<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('class_types')->insert([
            ['name' => 'Лекционное занятие'],
            ['name' => 'Практическое занятие'],
            ['name' => 'Лабораторное занятие'],
            ['name' => 'Экзаменационное занятие'],
            ['name' => 'Защита курсового проекта'],
            ['name' => 'Защита дипломного проекта'],
        ]);
    }
}
