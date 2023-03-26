<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
        $students = DB::table('students')->where('class', '=', $class)->get();
        $selected_subject = DB::table('subjects')->where('id', '=', $subject)->get()[0];
        $lessons_dates = DB::table('lessons')
            ->join('students', 'lessons.student_id', '=', 'students.id')
            ->where('subject_id', $subject)
            ->where('students.class', $class)
            ->select('created_at')
            ->distinct('created_at')
            ->get();
        $lessons = DB::table('lessons')
            ->join('students', 'lessons.student_id', '=', 'students.id')
            ->where('subject_id', $subject)
            ->where('students.class', $class)
            ->select('lessons.*', 'students.first_name', 'students.last_name')
            ->get();
        return view('lesson', ['subject' => $selected_subject,
                               'students' => $students,
                               'lessons_dates' => $lessons_dates,
                               'lessons' => $lessons]);
    }
    public function end_lesson(Request $request) {
        $request->validate([
            'date' => 'required',
        ]);
        $lesson = new Lessons();
        $subject_id = $request->input('subj_id');
        $date = $request->input('date');
        $vars = $request->input();
        unset($vars['subj_id']);
        unset($vars['_token']);
        unset($vars['date']);
        foreach ($vars as $key => $value) {
            $lesson = new Lessons();
            $lesson->subject_id = $subject_id;
            $lesson->student_id = (int) explode("_", $key)[1];
            if (is_null($value)) {
                $lesson->rating = '';
            } else {
                $lesson->rating = $value;
            }
            $lesson->created_at = $date;
            $lesson->save();
        }
        return back()->withInput();
    }
}
