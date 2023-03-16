<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $subject = DB::table('subjects')->where('id', '=', $subject)->get()[0];
        return view('lesson', ['students' => $students, 'subject' => $subject]);
    }
    public function end_lesson($request, $class, $subject) {
        $id = $request->input('subj_id');
        echo $id;
        dd($request);
        // dd($class);
        // $subjects = DB::table('subjects')->with('teacher')->get();
        return redirect()->route('/');
    }
}
