<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAccount extends Model implements Authenticatable
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "person_id",
      "login",
      "password"
    ];

    protected $table = 'user_accounts';

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

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPasswordName()
    {
        return 'password';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
