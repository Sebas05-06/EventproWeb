<section class="pricing" id="recintos">
  <div class="section-heading">
    <h2 class="section-heading__title">Nuestros recintos y tarifas</h2>
    <p class="section-heading__subtitle">Tarifas de referencia por hora o por día completo. La cotización final incluye los servicios que elijas.</p>
  </div>

  <div class="pricing__grid">
    @foreach ($recintos as $recinto)
      <article class="pricing-card {{ $recinto->destacado ? 'pricing-card--featured' : '' }}">
        @if ($recinto->destacado)
          <span class="badge badge--accent pricing-card__tag">Más reservado</span>
        @endif
        <h3 class="pricing-card__name">{{ $recinto->nombre }}</h3>
        <p class="pricing-card__price">
          <span class="pricing-card__amount">{{ config('empresa.moneda') }}{{ number_format($recinto->tarifa_dia) }}</span>
          <span class="pricing-card__period">/día · {{ config('empresa.moneda') }}{{ number_format($recinto->tarifa_hora) }}/hora</span>
        </p>
        <p class="pricing-card__description">{{ $recinto->descripcion }}</p>
        <ul class="pricing-card__features">
          @foreach ($recinto->capacidades as $cap)
            <li class="pricing-card__feature">{{ ucfirst($cap->montaje) }}: {{ number_format($cap->personas) }} personas</li>
          @endforeach
        </ul>
        <a class="btn {{ $recinto->destacado ? 'btn--primary' : 'btn--outline' }} btn--block" href="{{ route('cotizacion', ['recinto' => $recinto->nombre]) }}" target="_blank" rel="noopener">Cotizar {{ $recinto->nombre }}</a>
      </article>
    @endforeach
  </div>
</section>
