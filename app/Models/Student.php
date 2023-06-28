<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
//    protected $primaryKey = 'student_id';
    public function lessons() {
        return $this->hasMany(Lessons::class, 'student_id');
    }
}
