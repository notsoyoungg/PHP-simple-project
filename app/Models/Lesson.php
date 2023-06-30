<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['subject_id', 'group_id', 'created_at'];
    protected $casts = ['created_at'=>'datetime'];
    public function subject() {
        return $this->belongsTo(Subject::class, );
    }
    public function grades() {
        return $this->hasMany(Grade::class);
    }
    public function group() {
        return $this->belongsTo(Group::class);
    }
}
