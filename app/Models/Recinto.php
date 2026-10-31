<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recinto extends Model
{
    protected $table = 'recintos';

    protected $fillable = ['nombre', 'descripcion', 'tarifa_hora', 'tarifa_dia', 'destacado'];

    protected function casts(): array
    {
        return ['destacado' => 'boolean'];
    }

    public function capacidades(): HasMany
    {
        return $this->hasMany(Capacidad::class);
    }

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class, 'evento_recinto')
            ->withPivot('montaje')->withTimestamps();
    }
}
