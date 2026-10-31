<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'mensajes_contacto';

    protected $fillable = ['nombre', 'email', 'tipo_evento', 'mensaje'];
}
