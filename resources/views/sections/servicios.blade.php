<section class="features" id="servicios">
  <div class="section-heading">
    <h2 class="section-heading__title">Todo lo que tu evento necesita, en un solo lugar</h2>
    <p class="section-heading__subtitle">Elige el recinto, suma los servicios que quieras y nosotros coordinamos el resto.</p>
  </div>

  <div class="features__grid">
    <article class="feature-card feature-card--highlight">
      <span class="badge badge--accent feature-card__tag">Lo más pedido</span>
      <span class="feature-card__icon" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="3" y="5" width="22" height="18" rx="2.5" stroke="currentColor" stroke-width="1.6"/>
          <path d="M3 10.5H25" stroke="currentColor" stroke-width="1.6"/>
          <path d="M8.5 3V7.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          <path d="M19.5 3V7.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          <path d="M8.5 15L12 18.5L19.5 11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
      <h3 class="feature-card__title">Recintos para cada formato</h3>
      <p class="feature-card__description">Salas y auditorios con montaje en teatro, escuela o banquete. Tu fecha queda reservada y nadie más puede ocuparla.</p>
    </article>

    <article class="feature-card">
      <span class="feature-card__icon" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="10" cy="9" r="3.4" stroke="currentColor" stroke-width="1.6"/>
          <circle cx="19" cy="9" r="2.6" stroke="currentColor" stroke-width="1.6"/>
          <path d="M3.5 23V21.5C3.5 18.5 6.5 16.2 10 16.2C13.5 16.2 16.5 18.5 16.5 21.5V23" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          <path d="M17.5 17C20.2 17.3 22.5 19.2 22.5 21.5V23" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </span>
      <h3 class="feature-card__title">Servicios adicionales</h3>
      <p class="feature-card__description">Contrata {{ strtolower($servicios->pluck('nombre')->join(', ')) }}. Cada servicio tiene precio definido y se suma a tu cotización.</p>
    </article>

    <article class="feature-card">
      <span class="feature-card__icon" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 4H18L22 8V24H6V4Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
          <path d="M18 4V8H22" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
          <path d="M9.5 14H18.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
          <path d="M9.5 18H15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </span>
      <h3 class="feature-card__title">Cotización y contrato claros</h3>
      <p class="feature-card__description">Recibes una propuesta con recintos, servicios y descuentos por volumen. Si la apruebas, se convierte en contrato, y al terminar el evento te pedimos tu opinión.</p>
    </article>
  </div>
</section>
