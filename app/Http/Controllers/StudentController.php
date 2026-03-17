<?php

namespace App\Http\Controllers;

use App\Dto\StudentDTO;
use App\Models\Group;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    const ENTRIES_PER_PAGE = 20;

    public function index(Request $request){
        $page = $request->input('page', 0);

        $students = $this->takeStudent($page);
        $groups = Group::all();
        return view('student.index', ['students'=>$students, 'groups' => $groups]);
    }

    public function uploadData(Request $request){
        $pages = $request->input('page', 0);

        $students = $this->takeStudent($pages);
        $groups = Group::all();

        $objects = $students->map(fn($student) => StudentDTO::fromModel($student));

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

    public function assignGroup(Request $request){
        error_log('test');
        $studentId = $request->studentId;
        $groupId = $request->groupId;

        error_log(json_encode(['studentId'=>$studentId, 'groupId'=>$groupId]));

        $service = new StudentService();
        try {
            $service->assignGroup($studentId, $groupId);
        }
        catch(ModelNotFoundException $exception){
            return response()->json(['error'=>'Student or group not found'], 404);
        }
    }
}
