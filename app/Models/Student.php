<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
//    protected $primaryKey = 'student_id';
    public function students_grades() {
        return $this->hasMany(StudentsGrades::class, 'student_id');
    }
}
