<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Eventos</h2>
            <a href="{{ route('eventos.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md text-xs font-semibold uppercase tracking-widest hover:bg-gray-700">Nuevo evento</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('exito'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('exito') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="px-4 py-3">Evento</th>
                            <th class="px-4 py-3">Cliente</th>
                            <th class="px-4 py-3">Recintos</th>
                            <th class="px-4 py-3">Fecha</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($eventos as $evento)
                            <tr class="border-t">
                                <td class="px-4 py-3">{{ $evento->titulo }} <span class="text-gray-500">({{ $evento->tipo }})</span></td>
                                <td class="px-4 py-3">{{ $evento->cliente->nombre }}</td>
                                <td class="px-4 py-3">{{ $evento->recintos->pluck('nombre')->join(', ') ?: 'Sin asignar' }}</td>
                                <td class="px-4 py-3">{{ $evento->fecha_inicio->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3">{{ ucfirst($evento->estado) }}</td>
                                <td class="px-4 py-3 text-right whitespace-nowrap">
                                    <a class="text-indigo-600 hover:underline" href="{{ route('eventos.edit', $evento) }}">Editar</a>
                                    <form class="inline" method="POST" action="{{ route('eventos.destroy', $evento) }}" onsubmit="return confirm('¿Eliminar este evento?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ml-3 text-red-600 hover:underline" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td class="px-4 py-6 text-gray-500" colspan="6">Todavía no hay eventos. Crea el primero con el botón Nuevo evento.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $eventos->links() }}</div>
        </div>
    </div>
</x-app-layout>
