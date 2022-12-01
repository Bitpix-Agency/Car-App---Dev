<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'phone_no',
        'user_bio',
        'address',
        'city',
        'country',
        'postcode',
        'lat',
        'lng',
        'profile_image',
        'job',
        'photo_id_url',
        'selfie_url',
        'document_url',
    ];

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
