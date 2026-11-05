<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Mensaje;
use App\Models\Recinto;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totales' => [
                'eventos' => Evento::count(),
                'clientes' => Cliente::count(),
                'recintos' => Recinto::count(),
                'solicitudes' => Mensaje::count(),
            ],
            'proximos' => Evento::with(['cliente', 'recintos'])
                ->where('fecha_fin', '>=', now())
                ->orderBy('fecha_inicio')
                ->limit(5)
                ->get(),
            'solicitudes' => Mensaje::latest()->limit(5)->get(),
        ]);
    }
}
