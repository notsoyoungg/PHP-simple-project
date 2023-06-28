<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index() {
        $subjects = new Subject();
        return view('index2', ['subjects' => $subjects->all()]);
    }
    public function get_class($class) {
        $subjects = Subject::with('teacher')->get();
        return view('index', ['subjects' => $subjects, 'class' => $class]);
    }
    public function get_lesson($class, $subject) {
//        почему этот код возвращает "select * from "students" where "students"."id" is null" ?????
//        $something = new Lessons();
//        dd($something->student()->toSql());
        $lessons = Lessons::whereHas('student', function ($query) use ($class) {
            $query->where('class', $class);
        })->whereSubjectId($subject)->get();
        $lessonsDates = Lessons::whereHas('student', function ($query) use ($class) {
            $query->where('class', $class);
        })->whereSubjectId($subject)->distinct('created_at')->get();
        $students = Student::whereClass($class)->get();
        $subject = Subject::whereId($subject)->first();
        return view('lesson', ['subject' => $subject,
                               'students' => $students,
                               'lessons_dates' => $lessonsDates,
                               'lessons' => $lessons,
                               'class' => $class]);
    }
    public function end_lesson(Request $request) {
        $request->validate([
            'date' => 'required',
        ]);
        $subject_id = $request->input('subj_id');
        $date = $request->input('date');
        $vars = $request->input();
        unset($vars['subj_id']);
        unset($vars['_token']);
        unset($vars['date']);
        foreach ($vars as $key => $value) {
            $student_id = (int) explode("_", $key)[1];
            if (is_null($value)) {
                $rating = '';
            } else {
                $rating = $value;
            }
            Lessons::create([
                'subject_id' => $subject_id,
                'student_id' => $student_id,
                'rating' => $rating,
                'created_at' => $date
            ]);
        }
        return back()->withInput();
    }
}
