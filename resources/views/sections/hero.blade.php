<section class="hero" id="inicio">
  <div class="hero__backdrop" aria-hidden="true">
    <svg class="hero__pattern" viewBox="0 0 1200 800" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <circle cx="980" cy="160" r="420" fill="none" stroke="#D9A441" stroke-opacity="0.18" stroke-width="1"/>
      <circle cx="980" cy="160" r="300" fill="none" stroke="#D9A441" stroke-opacity="0.22" stroke-width="1"/>
      <circle cx="980" cy="160" r="180" fill="none" stroke="#D9A441" stroke-opacity="0.28" stroke-width="1"/>
      <line x1="0" y1="640" x2="1200" y2="640" stroke="#AFC2E8" stroke-opacity="0.12" stroke-width="1"/>
      <line x1="0" y1="700" x2="1200" y2="700" stroke="#AFC2E8" stroke-opacity="0.12" stroke-width="1"/>
    </svg>
  </div>

  <div class="hero__inner">
    <div class="hero__content">
      <h1 class="hero__title">El lugar para tu congreso, boda, feria o concierto.</h1>
      <p class="hero__subtitle">En {{ config('empresa.nombre') }} te damos el recinto, el equipamiento y los servicios que tu evento necesita, con una cotización clara y un equipo que lo coordina contigo de principio a fin.</p>
      <div class="hero__actions">
        <a class="btn btn--primary btn--large" href="{{ route('cotizacion') }}" target="_blank" rel="noopener">Pedir cotización</a>
        <a class="btn btn--ghost btn--large" href="{{ route('recintos') }}" target="_blank" rel="noopener">Ver recintos</a>
      </div>
    </div>

    <div class="hero__visual" aria-hidden="true">
      <div class="hero__panel">
        <div class="hero__panel-header">
          <span class="hero__panel-dot"></span>
          <span class="hero__panel-dot"></span>
          <span class="hero__panel-dot"></span>
          <span class="hero__panel-title">Próximos eventos — Salón Real</span>
        </div>
        <ul class="hero__panel-list">
          <li class="hero__panel-row">
            <span class="hero__panel-time">08:00</span>
            <span class="hero__panel-event">Congreso de Innovación</span>
            <span class="badge badge--accent">Confirmado</span>
          </li>
          <li class="hero__panel-row hero__panel-row--blocked">
            <span class="hero__panel-time">16:00</span>
            <span class="hero__panel-event">Boda Torres · Castillo</span>
            <span class="badge">En montaje</span>
          </li>
          <li class="hero__panel-row">
            <span class="hero__panel-time">09:00</span>
            <span class="hero__panel-event">Feria Empresarial Regional</span>
            <span class="badge">Planificado</span>
          </li>
        </ul>
      </div>
      <div class="hero__stat">
        <span class="hero__stat-number">{{ $totalRecintos }}</span>
        <span class="hero__stat-label">recintos para distintos formatos y aforos</span>
      </div>
    </div>
  </div>
</section>
