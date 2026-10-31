<header class="site-header">
  <div class="site-header__inner">
    <a class="logo" href="{{ route('inicio') }}">
      <span class="logo__mark" aria-hidden="true">@include('partials.logo-mark')</span>
      <span class="logo__word">{{ config('empresa.marca') }}</span>
    </a>

    <input class="nav-toggle" type="checkbox" id="nav-toggle" aria-hidden="true">
    <label class="nav-toggle__btn" for="nav-toggle">
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="nav-toggle__bar"></span>
      <span class="sr-only">Abrir menú</span>
    </label>

    <nav class="nav" aria-label="Navegación principal">
      <ul class="nav__list">
        <li class="nav__item"><a class="nav__link {{ request()->routeIs('inicio') ? 'nav__link--active' : '' }}" href="{{ route('inicio') }}#inicio">Inicio</a></li>
        <li class="nav__item"><a class="nav__link" href="{{ route('inicio') }}#servicios">Qué ofrecemos</a></li>
        <li class="nav__item"><a class="nav__link {{ request()->routeIs('recintos') ? 'nav__link--active' : '' }}" href="{{ route('recintos') }}" target="_blank" rel="noopener">Recintos</a></li>
        <li class="nav__item"><a class="nav__link" href="{{ route('inicio') }}#testimonios">Clientes</a></li>
        <li class="nav__item"><a class="nav__link {{ request()->routeIs('cotizacion') ? 'nav__link--active' : '' }}" href="{{ route('cotizacion') }}" target="_blank" rel="noopener">Contacto</a></li>
      </ul>
      @auth
        <a class="btn btn--outline btn--small" href="{{ route('dashboard') }}">Panel</a>
      @else
        <a class="btn btn--outline btn--small" href="{{ route('login') }}">Ingresar</a>
      @endauth
      <a class="btn btn--primary btn--small nav__cta" href="{{ route('cotizacion') }}" target="_blank" rel="noopener">Pedir cotización</a>
    </nav>
  </div>
</header>
