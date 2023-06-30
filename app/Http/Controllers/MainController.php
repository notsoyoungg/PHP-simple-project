<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Subject;
use App\Services\GradeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MainController extends Controller
{
    public function index() {
        return view('index', ['subjects' => Subject::all()]);
    }
    public function get_class($groupId) {
        $subjects = Subject::with('teacher')->get();
        return view('class', ['subjects' => $subjects, 'group_id' => $groupId]);
    }
    public function get_lesson($groupId, $subjectId) {
        $subject = Subject::whereId($subjectId)->first();
        $students = Student::whereGroupId($groupId)->get();;
        $lessons = Lesson::whereSubjectId($subjectId)->whereGroupId($groupId)->get();
        $grades = Grade::whereHas('lesson', function ($query) use ($subjectId, $groupId) {
            $query->whereSubjectId($subjectId)->whereGroupId($groupId);
        })->get();
        return view('lesson', ['subject' => $subject,
                                    'students' => $students,
                                    'lessons' => $lessons,
                                    'grades' => $grades,
                                    'groupId' => $groupId]);
    }
    public function end_lesson(Request $request) {
        $service = new GradeService();
        $service->handleData($request);
        return back()->withInput();
    }
}
