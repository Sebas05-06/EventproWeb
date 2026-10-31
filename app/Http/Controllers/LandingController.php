<?php

namespace App\Http\Controllers;

use App\Models\Recinto;
use App\Models\Servicio;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing', [
            'totalRecintos' => Recinto::count(),
            'servicios' => Servicio::orderBy('id')->get(),
        ]);
    }

    public function recintos()
    {
        return view('recintos', [
            'recintos' => Recinto::with('capacidades')->orderBy('tarifa_dia')->get(),
        ]);
    }

    public function cotizacion()
    {
        return view('cotizacion');
    }
}
