<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Membership extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'subscription_amount' => 'float',
        'members_price' => 'float',
        'membership_type' => 'integer',
        'status' => 'boolean',
        'agency_limit' => 'integer',
        'trial_length' => 'integer',
    ];

    /**
     * @return HasOne
     */
    public function type()
    {
        return $this->hasOne(MembershipType::class, 'id', 'membership_type');
    }
}
