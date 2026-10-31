# EventPro — Espacios Magníficos S.A.

Sitio web y panel de gestión de eventos de un centro de convenciones. Proyecto académico en Laravel 13.

## Funciones
- Página pública con recintos, tarifas y servicios leídos de la base de datos.
- Formulario de contacto con validación en servidor.
- Inicio de sesión y registro con Laravel Breeze.
- Panel privado con CRUD de eventos (cliente, recintos, servicios, fechas y estado).

## Tablas y relaciones (Eloquent)
- clientes 1—N eventos
- users 1—N eventos (responsable interno)
- recintos 1—N capacidades
- eventos N—M recintos (evento_recinto)
- eventos N—M servicios (evento_servicio, con cantidad)
- mensajes_contacto (formulario público)

## Instalación local
```
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```
Usuario de demostración: admin@ejemplo.com / password (cámbialo en producción).

## Despliegue
Railway con MySQL. Variables en `.env.railway.example`.
