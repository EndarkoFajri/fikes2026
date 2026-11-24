<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $guarded = [];

    protected $casts = [
        'misi' => 'array',
        'tujuan' => 'array',
        'sasaran' => 'array',
        'is_aktif' => 'boolean',
    ];
}