# EventPro — Espacios Magníficos S.A.

**Estudiante:** Sebastian (GitHub: Sebas05-06)
**Curso:** Programación web con Laravel (proyecto académico)

## Descripción

EventPro es el sitio web y panel de gestión de eventos del centro de convenciones "Espacios Magníficos S.A.". La parte pública muestra los servicios, los recintos con sus tarifas y capacidades (leídos de la base de datos) y un formulario para pedir cotización. La parte privada permite al personal iniciar sesión y administrar los eventos: cliente, recintos, servicios, fechas, asistentes y estado.

Funciones principales:

- Página principal con servicios y testimonios.
- Páginas independientes de recintos (`/recintos`) y de cotización (`/cotizacion`), que se abren en una pestaña nueva desde los botones y el menú.
- Formulario de cotización con validación en servidor; los mensajes se guardan en la base de datos.
- Registro e inicio de sesión con Laravel Breeze.
- Panel privado con CRUD de eventos.

## Tablas implementadas y relaciones

| Tabla | Descripción | Relaciones |
|---|---|---|
| `users` | Usuarios del sistema (personal interno) | 1 a N con `eventos` (responsable) |
| `clientes` | Clientes del centro de convenciones | 1 a N con `eventos` |
| `recintos` | Salas y auditorios con tarifa por hora y por día | 1 a N con `capacidades`; N a M con `eventos` |
| `capacidades` | Aforo de cada recinto según el montaje (teatro, escuela, banquete) | N a 1 con `recintos` |
| `servicios` | Servicios adicionales con precio y unidad | N a M con `eventos` |
| `eventos` | Eventos programados (tipo, fechas, asistentes, estado) | N a 1 con `clientes` y `users`; N a M con `recintos` y `servicios` |
| `evento_recinto` | Tabla pivote entre eventos y recintos (campo `montaje`) | N a M |
| `evento_servicio` | Tabla pivote entre eventos y servicios (campo `cantidad`) | N a M |
| `mensajes_contacto` | Solicitudes enviadas desde el formulario público | Sin relaciones |

```mermaid
erDiagram
    clientes ||--o{ eventos : "contrata"
    users ||--o{ eventos : "es responsable"
    recintos ||--o{ capacidades : "tiene"
    eventos }o--o{ recintos : "evento_recinto"
    eventos }o--o{ servicios : "evento_servicio"
```

## Instrucciones para correr localmente

Requisitos: PHP 8.4 o superior, Composer, Node.js y npm. La base de datos por defecto es SQLite, así que no hace falta instalar un servidor de base de datos.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm run build
php artisan serve
```

En Windows (PowerShell) reemplaza `cp` por `copy` y `touch database/database.sqlite` por `New-Item database/database.sqlite`.

Abre `http://localhost:8000`. Para desarrollo con recarga automática de estilos, ejecuta `npm run dev` en una segunda terminal en lugar de `npm run build`.

Usuario de demostración (creado por el seeder): `admin@ejemplo.com` / `password`. Cámbialo antes de publicar el sitio.

## Capturas de pantalla

Página principal

![Página principal](docs/capturas/inicio.png)

Recintos y tarifas (`/recintos`)

![Recintos y tarifas](docs/capturas/recintos.png)

Pedir cotización (`/cotizacion`)

![Pedir cotización](docs/capturas/cotizacion.png)

Inicio de sesión

![Inicio de sesión](docs/capturas/login.png)

Listado de eventos

![Listado de eventos](docs/capturas/eventos-listado.png)

Formulario de evento

![Formulario de evento](docs/capturas/eventos-formulario.png)

## Despliegue en Vercel

El proyecto usa el runtime comunitario `vercel-php` (ver `vercel.json` y `api/index.php`). Necesita una base de datos externa (MySQL o Postgres), porque SQLite no funciona en Vercel.

1. Crea la base de datos externa y guarda sus datos de conexión.
2. Sube el proyecto a GitHub (sin `.env`).
3. En Vercel importa el repositorio y carga las variables de `.env.vercel.example`.
4. Despliega. Las migraciones se ejecutan en cada despliegue (script `vercel` de `composer.json`).
5. Una sola vez, desde tu equipo y con las variables `DB_*` apuntando a la base remota, ejecuta `php artisan db:seed` para cargar recintos, servicios y el usuario de demostración.

Si cambias los estilos de Tailwind, ejecuta `npm run build` y sube `public/build` al repositorio, porque Vercel no compila los assets.

## Despliegue en Render (alternativa)

El `Dockerfile` y `docker-start.sh` permiten desplegar en Render como Web Service con lenguaje **Docker**. Deja vacío el campo de comando de inicio. Usa la misma base de datos externa (MySQL) y carga las variables de `.env.vercel.example` más `APP_ENV=production`, `APP_DEBUG=false`, `SESSION_DRIVER=database`, `CACHE_STORE=database` y `LOG_CHANNEL=stderr`. Las migraciones se ejecutan al arrancar.
