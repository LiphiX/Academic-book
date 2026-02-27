<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'Факультет информационных систем и технологий'],
            ['name' => 'Факультет компьютерных информационных технологий и автоматики'],
            ['name' => 'Инженерно-экономический факультет'],
            ['name' => 'Учётно-финансовый факультет'],
            ['name' => 'Физико-технический факультет'],
            ['name' => 'Исторический факультет'],
        ]);
    }
}
