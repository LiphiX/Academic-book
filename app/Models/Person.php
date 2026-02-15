<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'passport'
        ];

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function teacher(){
        return $this->hasOne(Teacher::class);
    }

    public function userAccounts(){
        return $this->hasMany(UserAccount::class);
    }
}

