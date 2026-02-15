<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "name"
    ];

    //1:M - One department has many teachers.
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    //1:M - One department includes many specialities.
    public function specialities(){
        return $this->hasMany(Speciality::class);
    }
}
