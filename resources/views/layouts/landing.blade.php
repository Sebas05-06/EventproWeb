<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titulo', config('empresa.nombre') . ' — Centro de convenciones y eventos')</title>
<meta name="description" content="Recintos, equipamiento y servicios para congresos, bodas, ferias y conciertos.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>

@include('partials.header')

<main>
@yield('contenido')
</main>

@include('partials.footer')

</body>
</html>
