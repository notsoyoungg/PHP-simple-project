<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    use HasFactory;
    protected $casts = ['created_at'=>'datetime'];
    public function student() {
        return $this->belongsTo(Student::class);
    }
}
