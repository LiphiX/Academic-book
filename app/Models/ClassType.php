<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassType extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "name"
    ];

    protected $table = "classTypes";

    //1:M - One type belongs to many classes.
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
