<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Discipline;

class Speciality extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "name",
      "department_id"
    ];

    //M:1 - One specialty is included in one department.
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function disciplines(){
        return $this->belongsToMany(Discipline::class, 'curriculums');
    }
}
