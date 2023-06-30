<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['lesson_id', 'student_id', 'grade'];
    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
