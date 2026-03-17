<?php

namespace App\Http\Controllers;

use App\Dto\TeacherDTO;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    const ENTRIES_PER_PAGE = 20;

    public function index(Request $request){
        $page = $request->input('page', 0);

        $teachers = $this->takeTeachers($page);
        return view('teacher.index', ['teachers' => $teachers]);
    }

    public function uploadData(Request $request){
        $pages = $request->input('page', 0);

        $teachers = $this->takeTeachers($pages);

        $objects = $teachers->map(fn($teacher) => TeacherDTO::fromModel($teacher));

        return ['teachers'=>$objects];
    }

    private function takeTeachers($page){
        $teachers = Teacher::with(['department', 'person'])
            ->skip($page*self::ENTRIES_PER_PAGE)
            ->take(self::ENTRIES_PER_PAGE)
            ->orderBy('id')
            ->get();

        return $teachers;
    }
}
