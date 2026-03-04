<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curriculum extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "speciality_id",
        "discipline_id"
    ];

    public function speciality(){
        return $this->belongsTo(Speciality::class);
    }

    public function discipline(){
        return $this->belongsTo(Discipline::class);
    }
}
