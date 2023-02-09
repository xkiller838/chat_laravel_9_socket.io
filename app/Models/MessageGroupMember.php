<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageGroupMember extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message_group_id', 'status'];

    public function message_group() {
        return $this->belongsTo(MessageGroup::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
