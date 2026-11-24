<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RencanaPengembangan extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_aktif' => 'boolean',
    ];
}