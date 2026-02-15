<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    //1:M - One group contains many students.
    public function students(){
        return $this->hasMany(Student::class);
    }

    //1:M - One group has many classes.
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function timetables(){
        return $this->hasMany(Timetable::class);
    }
}
