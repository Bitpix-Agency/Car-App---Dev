<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, Billable;

    public function votes()
    {
        return $this->hasMany(Upvote::class, 'to_user_id', 'id');
    }

    public function voted()
    {
        return $this->hasMany(Upvote::class, 'from_user_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return float
     */
    public function getAverageRatingAttribute()
    {
        return round(UserRating::where('to_user', $this->id)->avg('rating'), 1, PHP_ROUND_HALF_DOWN);
    }

    protected $appends =[
        'average-rating'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uuid',
        'fb_id',
        'is_admin',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'trial_ends_at',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'card_brand',
        'card_last_four',
        'fb_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];
}
