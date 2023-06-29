<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
    public function students_grades() {
        return $this->hasMany(StudentsGrades::class);
    }
}
