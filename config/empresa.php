<?php

// Datos de la empresa y del catálogo. Se leen en las vistas con config('empresa.clave').
// Cambia aquí los valores; los de contacto son de ejemplo.
return [
    'nombre' => 'Espacios Magníficos S.A.',
    'marca' => 'EventPro',
    'correo' => env('EMPRESA_CORREO', 'eventos@ejemplo.com'),
    'telefono' => env('EMPRESA_TELEFONO', '+000 0000 0000'),
    'direccion' => env('EMPRESA_DIRECCION', 'Dirección del centro de convenciones'),

    'moneda' => '$',
];
