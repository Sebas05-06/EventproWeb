<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'tipo', 'email', 'telefono'];

    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
}
