<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('empresa.marca') }} — Panel</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v={{ @filemtime(public_path('css/estilos.css')) }}">
</head>
<body class="panel">
  @include('layouts.navigation')

  @isset($header)
    <header class="panel__header">
      <div class="panel__header-inner">
        {{ $header }}
      </div>
    </header>
  @endisset

  <main class="panel__main">
    {{ $slot }}
  </main>
</body>
</html>
