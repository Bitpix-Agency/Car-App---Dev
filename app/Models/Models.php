<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Models extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'models';

    protected $guarded = [];

    /**
     * @return HasOne
     */
    public function make()
    {
        return $this->hasOne(Make::class, 'id', 'make_id');
    }
}
