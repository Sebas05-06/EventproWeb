<x-app-layout>
    <x-slot name="header">
        <h1 class="panel__title">Panel de gestión</h1>
    </x-slot>

    <div class="dash">
        <section class="dash__welcome">
            <div>
                <h2 class="dash__hello">Hola, {{ Auth::user()->name }}</h2>
                <p class="dash__lead">Este es el resumen de {{ config('empresa.nombre') }}: eventos, clientes y solicitudes de cotización.</p>
            </div>
            <div class="dash__actions">
                <a class="btn btn--primary" href="{{ route('eventos.create') }}">Nuevo evento</a>
                <a class="btn btn--outline" href="{{ route('eventos.index') }}">Ver todos los eventos</a>
            </div>
        </section>

        <section class="dash__stats" aria-label="Resumen">
            <article class="stat-card">
                <span class="stat-card__number">{{ $totales['eventos'] }}</span>
                <span class="stat-card__label">Eventos</span>
            </article>
            <article class="stat-card">
                <span class="stat-card__number">{{ $totales['clientes'] }}</span>
                <span class="stat-card__label">Clientes</span>
            </article>
            <article class="stat-card">
                <span class="stat-card__number">{{ $totales['recintos'] }}</span>
                <span class="stat-card__label">Recintos</span>
            </article>
            <article class="stat-card stat-card--accent">
                <span class="stat-card__number">{{ $totales['solicitudes'] }}</span>
                <span class="stat-card__label">Solicitudes de cotización</span>
            </article>
        </section>

        <div class="dash__grid">
            <section class="dash-card">
                <h3 class="dash-card__title">Próximos eventos</h3>
                @forelse ($proximos as $evento)
                    <a class="dash-row" href="{{ route('eventos.edit', $evento) }}">
                        <span class="dash-row__main">
                            <span class="dash-row__name">{{ $evento->titulo }}</span>
                            <span class="dash-row__meta">{{ $evento->cliente->nombre }} · {{ $evento->recintos->pluck('nombre')->join(', ') ?: 'Sin recinto asignado' }}</span>
                        </span>
                        <span class="dash-row__side">
                            <span class="dash-row__date">{{ $evento->fecha_inicio->format('d/m/Y H:i') }}</span>
                            <span class="badge {{ $evento->estado === 'confirmado' ? 'badge--accent' : '' }}">{{ ucfirst($evento->estado) }}</span>
                        </span>
                    </a>
                @empty
                    <p class="dash-card__empty">No hay eventos próximos. Crea uno con el botón Nuevo evento.</p>
                @endforelse
            </section>

            <section class="dash-card">
                <h3 class="dash-card__title">Solicitudes de cotización recientes</h3>
                @forelse ($solicitudes as $solicitud)
                    <div class="dash-row">
                        <span class="dash-row__main">
                            <span class="dash-row__name">{{ $solicitud->nombre }}</span>
                            <span class="dash-row__meta">{{ $solicitud->email }}{{ $solicitud->tipo_evento ? ' · ' . ucfirst($solicitud->tipo_evento) : '' }}</span>
                            <span class="dash-row__text">{{ \Illuminate\Support\Str::limit($solicitud->mensaje, 90) }}</span>
                        </span>
                        <span class="dash-row__side">
                            <span class="dash-row__date">{{ $solicitud->created_at->format('d/m/Y H:i') }}</span>
                        </span>
                    </div>
                @empty
                    <p class="dash-card__empty">Todavía no llegan solicitudes. Aparecerán aquí cuando alguien use el formulario de cotización.</p>
                @endforelse
            </section>
        </div>
    </div>
</x-app-layout>
