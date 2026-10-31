<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'tipo_evento' => ['nullable', 'in:congreso,boda,feria,concierto,otro'],
            'mensaje' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'nombre.required' => 'Escribe tu nombre para continuar.',
            'nombre.min' => 'El nombre es demasiado corto.',
            'tipo_evento.in' => 'Selecciona un tipo de evento de la lista.',
            'email.required' => 'Escribe tu correo.',
            'email.email' => 'Escribe un correo válido.',
            'mensaje.required' => 'Cuéntanos qué evento tienes en mente.',
            'mensaje.min' => 'Cuéntanos un poco más (mínimo 10 caracteres).',
        ]);

        Mensaje::create($datos);

        return redirect()->route('cotizacion')
            ->with('exito', '¡Gracias! Recibimos tu solicitud y te responderemos pronto.');
    }
}
