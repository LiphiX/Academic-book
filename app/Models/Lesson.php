<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "teacher_id",
      "group_id",
      "discipline_id",
      "date",
      "classType_id"
    ];

    protected $table = 'classes';

    //M:1 - One lesson is taught by one teacher.
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    //M:1 - One class can only be for ONE group.
    public function group(){
        return $this->belongsTo(Group::class);
    }

    //M:1 - The lesson is conducted in one discipline.
    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }

    //M:1 - One class is classified as one type.
    public function classType(){
        return $this->belongsTo(ClassType::class);
    }

    //1:M - Many grades are given in one classes.
    public function assesments(){
        return $this->hasMany(Assesment::class);
    }

    //1:M - One lesson contains many attendance records.
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
