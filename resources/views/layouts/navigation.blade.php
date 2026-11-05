<nav class="panel-nav" aria-label="Navegación del panel">
  <div class="panel-nav__inner">
    <div class="panel-nav__links">
      <a class="logo logo--on-dark panel-nav__brand" href="{{ route('dashboard') }}">
        <span class="logo__mark" aria-hidden="true">@include('partials.logo-mark', ['size' => 24])</span>
        <span class="logo__word">{{ config('empresa.marca') }}</span>
      </a>
      <a class="panel-nav__link {{ request()->routeIs('dashboard') ? 'panel-nav__link--active' : '' }}" href="{{ route('dashboard') }}">Panel</a>
      <a class="panel-nav__link {{ request()->routeIs('eventos.*') ? 'panel-nav__link--active' : '' }}" href="{{ route('eventos.index') }}">Eventos</a>
      <a class="panel-nav__link" href="{{ route('inicio') }}" target="_blank" rel="noopener">Ver sitio</a>
    </div>

    <div class="panel-nav__user">
      <a class="panel-nav__link {{ request()->routeIs('profile.*') ? 'panel-nav__link--active' : '' }}" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="panel-nav__logout" type="submit">Cerrar sesión</button>
      </form>
    </div>
  </div>
</nav>
