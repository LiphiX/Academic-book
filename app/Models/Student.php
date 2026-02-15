<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'Person_id',
        'Group_id',
        'ReceiptDate'
    ];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    //1:M - One student has many grades.
    public function assesments(){
        return $this->hasMany(Assesment::class);
    }

    //1:M - There are many attendance records for one student.
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    //M:1 - One student belongs to the same group.
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
