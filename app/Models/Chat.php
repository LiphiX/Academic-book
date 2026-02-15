<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "foundationDate",
        "founder_id"
    ];

    //M:1 - One chat have one founder.
    public function founder(){
        return $this->belongsTo(UserAccount::class);
    }
}
