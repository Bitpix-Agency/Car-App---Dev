<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function fromUser()
    {
        return $this->hasOne(User::class, 'id', 'from_user');
    }

    public function toUser()
    {
        return $this->hasOne(User::class, 'id', 'to_user');
    }
}
