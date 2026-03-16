<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;

class UserAccount extends Model implements Authenticatable
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "person_id",
      "login",
      "password",
      "role_id",
      "remember_token"
    ];

    protected $table = 'user_accounts';

    //M:1 - One account is registered by one person.
    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
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
        return $this->rememberToken;
    }

    public function setRememberToken($value)
    {
        $this->rememberToken = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function hasRole($role) : bool{
        if(is_array($role)){
            return $this->role()->whereIn('name', $role)->exists();
        }

        return $this->role()->where('name', $role)->exists();
    }
}
