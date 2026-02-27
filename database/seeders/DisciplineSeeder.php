<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\table;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:table('disciplines')->insert([
            ['name' => 'Физика'],
            ['name' => 'Высшая математика'],
            ['name' => 'Дискретная математика'],
            ['name' => 'Основы программирования'],
            ['name' => 'Web-программирование'],
            ['name' => 'Моделирование и проектирование систем'],
            ['name' => 'Программирование мобильных устройств'],
            ['name' => 'Базы данных'],
            ['name' => 'Компьютерные сети'],
            ['name' => 'История'],
            ['name' => 'Иностранный язык'],
            ['name' => 'Русский язык и культура речи'],
            ['name' => 'История'],
            ['name' => 'Философия'],
            ['name' => 'Экономика и менеджмент'],
            ['name' => 'Правоведение'],
            ['name' => 'Социология и психология'],
            ['name' => 'Основы российской государственности'],
            ['name' => 'Культурология'],
    ]);
    }
}
