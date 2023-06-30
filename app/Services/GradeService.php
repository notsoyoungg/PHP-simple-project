<?php

namespace App\Services;

use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;

class GradeService
{
    public function handleData(Request $request): void {
        $pass = [
            'subjId',
            'groupId',
            '_token',
        ];
        $lesson = Lesson::create([
            'subject_id'=> (int) $request->subjId,
            'group_id'=> (int) $request->groupId
        ]);
        foreach ($request->input() as $studentId => $grade) {
            if (!in_array($studentId, $pass)){
                Grade::create([
                    'lesson_id' => $lesson->id,
                    'student_id' => (int) $studentId,
                    'grade' => $grade,
                ]);
            }
        }
    }
}
