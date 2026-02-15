<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "student_id",
      "class_id",
      "mark"
    ];

    //M:1 - Many attendance records are assigned to one student
    public function student(){
        return $this->belongsTo(Student::class);
    }

    //M:1 - One attendance record belongs to one class.
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
