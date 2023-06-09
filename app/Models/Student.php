<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
//    protected $primaryKey = 'student_id';
    public function grades() {
        return $this->hasMany(Grade::class);
    }
    public function group() {
        return $this->belongsTo(Group::class);
    }
}
