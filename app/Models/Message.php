<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
      "sender_id",
      "sendDate",
      "content",
      "isRead",
      "chat_id"
    ];

    //M:1 - One message can be sent to one chat.
    public function chat(){
        return $this->belongsTo(Chat::class);
    }

    //M:1 - One message has one sender.
    public function sender(){
        return $this->belongsTo(UserAccount::class);
    }
}
