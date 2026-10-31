<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use App\Models\Recinto;
use App\Models\Servicio;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::with(['cliente', 'recintos', 'responsable'])
            ->orderBy('fecha_inicio')
            ->paginate(10);

        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.form', $this->datosFormulario(new Evento()));
    }

    public function store(Request $request)
    {
        $datos = $this->validar($request);

        $evento = Evento::create($datos + ['user_id' => $request->user()->id]);
        $this->sincronizar($evento, $request);

        return redirect()->route('eventos.index')->with('exito', 'Evento creado.');
    }

    public function edit(Evento $evento)
    {
        return view('eventos.form', $this->datosFormulario($evento));
    }

    public function update(Request $request, Evento $evento)
    {
        $evento->update($this->validar($request));
        $this->sincronizar($evento, $request);

        return redirect()->route('eventos.index')->with('exito', 'Evento actualizado.');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()->route('eventos.index')->with('exito', 'Evento eliminado.');
    }

    private function datosFormulario(Evento $evento): array
    {
        return [
            'evento' => $evento,
            'clientes' => Cliente::orderBy('nombre')->get(),
            'recintos' => Recinto::orderBy('nombre')->get(),
            'servicios' => Servicio::orderBy('nombre')->get(),
        ];
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'tipo' => ['required', 'in:congreso,boda,feria,concierto,otro'],
            'cliente_id' => ['required', 'exists:clientes,id'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after:fecha_inicio'],
            'asistentes' => ['required', 'integer', 'min:1'],
            'estado' => ['required', 'in:planificado,confirmado,finalizado,cancelado'],
            'recintos' => ['nullable', 'array'],
            'recintos.*' => ['exists:recintos,id'],
            'servicios' => ['nullable', 'array'],
            'servicios.*' => ['exists:servicios,id'],
        ], [
            'fecha_fin.after' => 'La fecha de fin debe ser posterior al inicio.',
        ]);
    }

    private function sincronizar(Evento $evento, Request $request): void
    {
        $evento->recintos()->sync($request->input('recintos', []));
        $evento->servicios()->sync($request->input('servicios', []));
    }
}
