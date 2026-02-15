<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "person_id",
      "department_id"
    ];

    //1:1 - One person can be one teacher.
    public function person(){
        return $this->belongsTo(Person::class);
    }

    //M:1 - One teacher belongs to one department.
    public function department(){
        return $this->belongsTo(Department::class);
    }

    //1:M - One teacher can teach many classes.
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    //1:M
    public function timetables(){
        return $this->hasMany(Timetable::class);
    }
}
