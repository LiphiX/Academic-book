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
        'person_id',
        'group_id',
        'receipt_date'
    ];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    //1:M - One student has many grades.
    public function assesments(){
        return $this->hasMany(Assessment::class);
    }

    //1:M - There are many attendance records for one student.
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }

    //M:1 - One student belongs to the same group.
    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function averageAttendance() : float{
        $totalAssessment = $this->attendances()->count();
        if($totalAssessment == 0){
            return 0;
        }

        $number = $this->attendances()
            ->where('state', true)
            ->count();

        return ($number / $totalAssessment) * 100;
    }

    public function averageAssessment() : float{
        $averageAttendance = $this->assesments()->average('mark');
        if(!$averageAttendance){
            return 0;
        }

        return $averageAttendance;
    }
}
