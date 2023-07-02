<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
    public function students() {
        return $this->hasMany(Student::class);
    }
}

