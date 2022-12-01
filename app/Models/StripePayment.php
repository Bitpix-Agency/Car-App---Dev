<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripePayment extends Model
{
    const STRIPE_STANDARD = 1;
    const STRIPE_ADD_USER = 2;
    const STRIPE_PREMIUM = 3;

    use HasFactory;

    /**
     * @var string[]
     */
    protected $casts = [
        'price' => 'float'
    ];

    /**
     * @var bool
     */
    protected $guarded = false;
}
