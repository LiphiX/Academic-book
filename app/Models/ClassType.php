<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassType extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    protected $table = "class_types";

    //1:M - One type belongs to many classes.
    public function timetable(){
        return $this->hasMany(Timetable::class);
    }
}
