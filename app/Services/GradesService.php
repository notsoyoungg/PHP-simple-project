<?php

namespace App\Services;

use Illuminate\Http\Request;

class GradesService
{
    public function handleData(Request $request) {
        $pass = [
            'subj_id',
            '_token',
            'lesson_date'
        ];
        $grades = [];
        foreach ($request->input() as $key => $value) {
            if (!in_array($key, $pass)){
                if (is_null($value)) {
                    $rating = '';
                } else {
                    $rating = $value;
                }
                $grades[] = [
                    'subject_id' => (int) $request->subj_id,
                    'student_id' => (int) $key,
                    'rating' => $rating,
                    'created_at' => $request->lesson_date
                ];
            }
        }
        return $grades;
    }
}
