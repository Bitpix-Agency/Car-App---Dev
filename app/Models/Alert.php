<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function make()
    {
        return $this->hasOne(Make::class, 'id', 'make_id');
    }

    public function models()
    {
        return $this->hasOne(Models::class, 'id', 'model_id');
    }
}
