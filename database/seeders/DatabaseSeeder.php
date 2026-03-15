<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DisciplineSeeder::class);
        $this->call(SpecialititySeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(ClassTypeSeeder::class);
        $this->call(CurriculumSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(ClassNumberSeeder::class);
        $this->call(TimetableSeeder::class);
        $this->call(UserAccountSeeder::class);
    }
}
