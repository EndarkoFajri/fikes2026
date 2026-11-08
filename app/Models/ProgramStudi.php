<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dosens(): HasMany
    {
        return $this->hasMany(Dosen::class);
    }
}