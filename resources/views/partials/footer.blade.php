<footer class="site-footer">
  <div class="site-footer__inner">
    <div class="site-footer__brand">
      <span class="logo logo--on-dark">
        <span class="logo__mark" aria-hidden="true">@include('partials.logo-mark', ['size' => 22])</span>
        <span class="logo__word">{{ config('empresa.marca') }}</span>
      </span>
      <p class="site-footer__tagline">Centro de convenciones para congresos, bodas, ferias y conciertos.</p>
    </div>

    <nav class="site-footer__nav" aria-label="Enlaces del pie de página">
      <span class="site-footer__heading">Explora</span>
      <a class="site-footer__link" href="{{ route('inicio') }}#servicios">Qué ofrecemos</a>
      <a class="site-footer__link" href="{{ route('recintos') }}" target="_blank" rel="noopener">Recintos y tarifas</a>
      <a class="site-footer__link" href="{{ route('inicio') }}#testimonios">Clientes</a>
    </nav>

    <div class="site-footer__contact">
      <span class="site-footer__heading">Contacto</span>
      <a class="site-footer__link" href="mailto:{{ config('empresa.correo') }}">{{ config('empresa.correo') }}</a>
      <a class="site-footer__link" href="tel:{{ preg_replace('/\s+/', '', config('empresa.telefono')) }}">{{ config('empresa.telefono') }}</a>
      <span class="site-footer__link">{{ config('empresa.direccion') }}</span>
    </div>

    <div class="site-footer__social">
      <span class="site-footer__heading">Síguenos</span>
      <ul class="social-list">
        <li class="social-list__item">
          <a class="social-list__link" href="#" aria-label="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 9H8V20H4V9Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><circle cx="6" cy="5" r="2" stroke="currentColor" stroke-width="1.6"/><path d="M12 9H16V11C16.8 9.6 18.2 8.7 20 9.3C21.5 9.8 22 11.2 22 13V20H18V14C18 12.9 17.3 12 16 12C14.7 12 14 12.9 14 14V20H12V9Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
          </a>
        </li>
        <li class="social-list__item">
          <a class="social-list__link" href="#" aria-label="Instagram">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="3" y="3" width="18" height="18" rx="5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.6"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor"/></svg>
          </a>
        </li>
        <li class="social-list__item">
          <a class="social-list__link" href="#" aria-label="X">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4L20 20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="M20 4L4 20" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="site-footer__bottom">
    <p class="site-footer__copy">© {{ date('Y') }} {{ config('empresa.nombre') }}. Todos los derechos reservados.</p>
  </div>
</footer>
