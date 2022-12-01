<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumInviteUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
    ];

    public function premiumUser()
    {
        return $this->hasOne(User::class, 'id', 'premium_user_id');
    }
}
