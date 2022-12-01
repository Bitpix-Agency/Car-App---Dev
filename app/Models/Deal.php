<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deal extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function to_user()
    {
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }

    /**
     * @return HasOne
     */
    public function from_user()
    {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }

    /**
     * @return HasOne
     */
    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
