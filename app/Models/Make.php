<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Make extends Model
{
    use HasFactory, SoftDeletes;

    public function models()
    {
        return $this->hasMany(Models::class);
    }

    /**
     * @var array
     */
    protected $guarded = [];
}
