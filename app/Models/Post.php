<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'regno',
        'post_desc',
        'make_id',
        'model_id',
        'price',
        'type',
        'transition',
        'engine',
        'location',
        'is_bid',
        'mileage',
        'doors',
        'seats',
        'year',
        'is_featured',
        'created_at',
        'updated_at',
        'owners',
        'is_sold',
        'is_delete',
        'sold_date',
        'drive',
        'fuel_type_id',
        'title',
        'body_type',
        'keys',
        'service_history',
        'dealer_history',
        'vehicle_status',
        'has_v5',
        'tread_1',
        'tread_2',
        'tread_3',
        'tread_4',
        'prep',
        'mot_expire',
        'is_waiting',
    ];

    protected $casts = [
        'price' => 'float',
        'is_bid' => 'boolean',
        'mileage' => 'float',
        'doors' => 'integer',
        'seats' => 'integer',
        'year' => 'integer',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'owners' => 'integer',
        'is_sold' => 'boolean',
        'is_delete' => 'boolean',
        'sold_date' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function fuelType()
    {
        return $this->hasOne(FuelType::class, 'id', 'fuel_type_id');
    }

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return HasOne
     */
    public function models()
    {
        return $this->hasOne(Models::class, 'id', 'model_id');
    }

    /**
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(PostImage::class);
    }

    /**
     * @return HasOne
     */
    public function make()
    {
        return $this->hasOne(Make::class, 'id', 'make_id');
    }
}
