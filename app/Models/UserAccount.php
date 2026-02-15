<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccount extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "person_id",
      "login",
      "password"
    ];

    //M:1 - One account is registered by one person.
    public function person(){
        return $this->belongsTo(Person::class);
    }

    //1:M - One user can send many messages.
    public function messages(){
        return $this->hasMany(Message::class);
    }

    //1:M - One user can create many chats.
    public function chats(){
        return $this->hasMany(Chat::class);
    }
}
