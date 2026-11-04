<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('empresa.marca') }} — Acceso</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body class="auth">
  <main class="auth__wrap">
    <a class="logo logo--on-dark auth__brand" href="{{ route('inicio') }}">
      <span class="logo__mark" aria-hidden="true">@include('partials.logo-mark', ['size' => 28])</span>
      <span class="logo__word">{{ config('empresa.marca') }}</span>
    </a>

    <div class="auth__card">
      {{ $slot }}
    </div>

    <a class="auth__back" href="{{ route('inicio') }}">&larr; Volver al sitio</a>
  </main>
</body>
</html>
