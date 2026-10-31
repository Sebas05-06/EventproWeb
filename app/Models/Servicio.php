<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = ['nombre', 'unidad', 'precio'];

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class, 'evento_servicio')
            ->withPivot('cantidad')->withTimestamps();
    }
}
