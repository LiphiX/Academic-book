<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassNumber extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "number",
        "start",
        "end"
    ];

    protected $table = "classNumbers";

    //1:M.
    public function timetables(){
        return $this->hasMany(Timetable::class);
    }
}
