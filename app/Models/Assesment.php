<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assesment extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "student_id",
      "class_id",
      "state"
    ];

    //M:1 - One grade is assigned to each student.
    public function student(){
        return $this->belongsTo(Student::class);
    }

    //M:1 - One grade belongs to one class.
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
