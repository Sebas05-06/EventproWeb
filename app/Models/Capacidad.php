<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Capacidad extends Model
{
    protected $table = 'capacidades';

    protected $fillable = ['recinto_id', 'montaje', 'personas'];

    public function recinto(): BelongsTo
    {
        return $this->belongsTo(Recinto::class);
    }
}
