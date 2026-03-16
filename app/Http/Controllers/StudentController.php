<?php

namespace App\Http\Controllers;

use App\Dto\StudentDTO;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    const ENTRIES_PER_PAGE = 20;

    public function getStudents(Request $request){
        $page = $request->input('page', 0);

        $students = $this->takeStudent($page);
        $groups = Group::all();
        return view('student.students', ['students'=>$students, 'groups' => $groups]);
    }

    public function uploadData(Request $request){
        $pages = $request->input('page', 0);

        $students = $this->takeStudent($pages);
        $groups = Group::all();

        $objects = $students->map(fn($student) => StudentDTO::fromModel($student));

        error_log($students);
        return ['students'=>$objects, 'groups' => $groups];
    }

    private function takeStudent($page){
        $students = Student::with(['group', 'person'])
            ->skip($page*self::ENTRIES_PER_PAGE)
            ->take(self::ENTRIES_PER_PAGE)
            ->orderBy('id')
            ->get();

        return $students;
    }
}
