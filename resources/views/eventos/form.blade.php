<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $evento->exists ? 'Editar evento' : 'Nuevo evento' }}
        </h2>
    </x-slot>

    @php
        $recintosSel = old('recintos', $evento->exists ? $evento->recintos->pluck('id')->all() : []);
        $serviciosSel = old('servicios', $evento->exists ? $evento->servicios->pluck('id')->all() : []);
        $fecha = fn ($campo) => old($campo, $evento->$campo?->format('Y-m-d\TH:i'));
    @endphp

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" class="bg-white shadow-sm sm:rounded-lg p-6 space-y-5"
                  action="{{ $evento->exists ? route('eventos.update', $evento) : route('eventos.store') }}">
                @csrf
                @if ($evento->exists) @method('PUT') @endif

                <div>
                    <x-input-label for="titulo" value="Título" />
                    <x-text-input id="titulo" name="titulo" class="block mt-1 w-full" :value="old('titulo', $evento->titulo)" required />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <x-input-label for="tipo" value="Tipo" />
                        <select id="tipo" name="tipo" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            @foreach (['congreso', 'boda', 'feria', 'concierto', 'otro'] as $t)
                                <option value="{{ $t }}" @selected(old('tipo', $evento->tipo) === $t)>{{ ucfirst($t) }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="estado" value="Estado" />
                        <select id="estado" name="estado" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                            @foreach (['planificado', 'confirmado', 'finalizado', 'cancelado'] as $e)
                                <option value="{{ $e }}" @selected(old('estado', $evento->estado ?? 'planificado') === $e)>{{ ucfirst($e) }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                    </div>
                </div>

                <div>
                    <x-input-label for="cliente_id" value="Cliente" />
                    <select id="cliente_id" name="cliente_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $c)
                            <option value="{{ $c->id }}" @selected((int) old('cliente_id', $evento->cliente_id) === $c->id)>{{ $c->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('cliente_id')" class="mt-2" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <x-input-label for="fecha_inicio" value="Inicio" />
                        <x-text-input id="fecha_inicio" type="datetime-local" name="fecha_inicio" class="block mt-1 w-full" :value="$fecha('fecha_inicio')" required />
                        <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="fecha_fin" value="Fin" />
                        <x-text-input id="fecha_fin" type="datetime-local" name="fecha_fin" class="block mt-1 w-full" :value="$fecha('fecha_fin')" required />
                        <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="asistentes" value="Asistentes" />
                        <x-text-input id="asistentes" type="number" min="1" name="asistentes" class="block mt-1 w-full" :value="old('asistentes', $evento->asistentes)" required />
                        <x-input-error :messages="$errors->get('asistentes')" class="mt-2" />
                    </div>
                </div>

                <fieldset>
                    <legend class="text-sm font-medium text-gray-700">Recintos</legend>
                    @foreach ($recintos as $r)
                        <label class="flex items-center gap-2 mt-1 text-sm">
                            <input type="checkbox" name="recintos[]" value="{{ $r->id }}" @checked(in_array($r->id, $recintosSel))>
                            {{ $r->nombre }}
                        </label>
                    @endforeach
                </fieldset>

                <fieldset>
                    <legend class="text-sm font-medium text-gray-700">Servicios</legend>
                    @foreach ($servicios as $s)
                        <label class="flex items-center gap-2 mt-1 text-sm">
                            <input type="checkbox" name="servicios[]" value="{{ $s->id }}" @checked(in_array($s->id, $serviciosSel))>
                            {{ $s->nombre }} ({{ $s->unidad }})
                        </label>
                    @endforeach
                </fieldset>

                <div class="flex items-center gap-3">
                    <x-primary-button>Guardar</x-primary-button>
                    <a href="{{ route('eventos.index') }}" class="text-sm text-gray-600 hover:underline">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
