<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toUser() {
        return $this->hasOne(User::class, 'id', 'to_user');
    }

    public function fromUser() {
        return $this->hasOne(User::class, 'id', 'from_user');
    }
}
