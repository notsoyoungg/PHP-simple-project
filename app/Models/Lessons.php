<?php

namespace App\Models;

use App\Observers\LessonObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $fillable = ['subject_id', 'student_id', 'rating', 'created_at'];
    protected $casts = ['created_at'=>'datetime'];
    public function student() {
        return $this->belongsTo(Student::class, );
    }
    public function subject() {
        return $this->belongsTo(Subject::class, );
    }
}
