<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidationRequest;
use App\Models\StudentsGrades;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;


class MainController extends BaseController
{
    public function index() {
        return view('index2', ['subjects' => Subject::all()]);
    }
    public function get_class($class) {
        $subjects = Subject::with('teacher')->get();
        return view('index', ['subjects' => $subjects, 'class' => $class]);
    }
    public function get_lesson($class, $subject_id) {
        $subject = Subject::whereId($subject_id)->first();
        $students = Student::whereClass($class)->get();
        $lessonsDates = $this->grades->getWithUniqueDates($class, $subject_id);
        $grades = $this->grades->getByClassAndSubjectId($class, $subject_id);
        return view('lesson', ['subject' => $subject,
                                    'students' => $students,
                                    'lessons_dates' => $lessonsDates,
                                    'grades' => $grades,
                                    'class' => $class]);
    }
    public function end_lesson(MyValidationRequest $request) {
        $grades = $this->service->handleData($request);
        foreach ($grades as $grade) {
            StudentsGrades::create($grade);
        }
        return back()->withInput();
    }
}
