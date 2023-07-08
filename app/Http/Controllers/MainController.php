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
        return view('index');
    }
    public function getClass() {
        $subjects = Subject::all();
        return view('class', ['subjects' => $subjects]);
    }
    public function startLesson($studentsGroupId, $subjectId) {
        $subject = Subject::whereId($subjectId)->first();
        $students = Student::whereGroupId($studentsGroupId)->get();
        $lessons = Lesson::whereSubjectId($subjectId)->whereGroupId($studentsGroupId)->get();
        return view('lesson', ['subject' => $subject,
                                    'students' => $students,
                                    'lessons' => $lessons]);
    }
    public function endLesson(Request $request) {
        $service = new GradeService();
        $service->handleData($request);
        return back()->withInput();
    }
}
