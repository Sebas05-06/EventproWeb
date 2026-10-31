<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'titulo', 'tipo', 'cliente_id', 'user_id',
        'fecha_inicio', 'fecha_fin', 'asistentes', 'estado',
    ];

    protected function casts(): array
    {
        return [
            'fecha_inicio' => 'datetime',
            'fecha_fin' => 'datetime',
        ];
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    // Responsable interno del evento (usuario del sistema)
    public function responsable(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recintos(): BelongsToMany
    {
        return $this->belongsToMany(Recinto::class, 'evento_recinto')
            ->withPivot('montaje')->withTimestamps();
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'evento_servicio')
            ->withPivot('cantidad')->withTimestamps();
    }
}
