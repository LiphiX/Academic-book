<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Timetable extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "classNumber_id",
        "teacher_id",
        "group_id",
        "discipline_id",
        "dayOfWeek"
    ];

    //M:1
    public function classNumber(){
        return $this->belongsTo(ClassNumber::class);
    }

    //M:1
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    //M:1
    public function group(){
        return $this->belongsTo(Group::class);
    }

    //M:1
    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }
}
