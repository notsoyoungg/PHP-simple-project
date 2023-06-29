<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentsGrades extends Model
{
    protected $fillable = ['subject_id', 'student_id', 'rating', 'created_at'];
    protected $casts = ['created_at'=>'datetime'];
    public function student() {
        return $this->belongsTo(Student::class, );
    }
    public function subject() {
        return $this->belongsTo(Subject::class, );
    }
    public function scopeByClassAndSubjectId($class, $subject_id) {
        return $this::whereHas('student', function ($query) use ($class) {
            $query->where('class', $class);
        })->whereSubjectId($subject_id);
    }
    public function getByClassAndSubjectId($class, $subject_id) {
        return $this->scopeByClassAndSubjectId($class, $subject_id)->get();
    }
    public function getWithUniqueDates($class, $subject_id) {
        return $this->scopeByClassAndSubjectId($class, $subject_id)->distinct('created_at')->get();
    }
}
