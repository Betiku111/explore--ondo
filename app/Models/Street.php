<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $fillable = [
        'name',
        'location',
        'description',
        'image',
        'is_popular',
    ];

    protected $casts = [
        'is_popular' => 'boolean',
    ];
}