<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
