<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discipline extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "name"
    ];

    //1:M - There are many classes in one discipline.
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    //1:M.
    public function timetable(){
        return $this->hasMany(Timetable::class);
    }
}
