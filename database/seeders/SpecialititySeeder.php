<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;

class SpecialititySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:table('specialities')->insert([
            ['name' => 'Фундаментальна информатика', 'department_id' => 1],
            ['name' => 'Информатика и вычислительная техника', 'department_id' => 1],
            ['name' => 'Информационные системы и технологии', 'department_id' => 1],
            ['name' => 'Бизнес-информатика', 'department_id' => 1],

            ['name' => 'Информационная безопасность', 'department_id' => 2],
            ['name' => 'Радиотехника', 'department_id' => 2],
            ['name' => 'Инфокомунникационные технологии и системы связи', 'department_id' => 2],
            ['name' => 'Электроника и наноэлектроника', 'department_id' => 2],
            ['name' => 'Приборостроение', 'department_id' => 2],
            ['name' => 'Автоматизация технологических процессов и производств', 'department_id' => 2],
            ['name' => 'Управление в технических системах', 'department_id' => 2],

            ['name' => 'Инноватика', 'department_id' => 3],
            ['name' => 'Экономика', 'department_id' => 3],
            ['name' => 'Экономика (очно-заочная форма)', 'department_id' => 3],
            ['name' => 'Менеджмент', 'department_id' => 3],
            ['name' => 'Менеджмент (очно-заочная форма)', 'department_id' => 3],
            ['name' => 'Управление персоналом', 'department_id' => 3],

            ['name' => 'Экономическая теория', 'department_id' => 4],
            ['name' => 'Финансы и кредит', 'department_id' => 4],
            ['name' => 'Учёт и аудит', 'department_id' => 4],
            ['name' => 'Торговое дело', 'department_id' => 4],
            ['name' => 'Таможенное дело', 'department_id' => 4],
            ['name' => 'Финансы и кредит', 'department_id' => 4],

            ['name' => 'Физика', 'department_id' => 5],
            ['name' => 'Радиофизика', 'department_id' => 5],
            ['name' => 'Техническая физика', 'department_id' => 5],
            ['name' => 'Техносферная физика', 'department_id' => 5],

            ['name' => 'История', 'department_id' => 6],
            ['name' => 'Политология', 'department_id' => 6],
            ['name' => 'Международные отношения', 'department_id' => 6],
    ]);
    }
}
