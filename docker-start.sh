#!/bin/sh
# Render indica el puerto en PORT; Apache debe escuchar ahí
PORT="${PORT:-10000}"
sed -ri "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Artisan corre como www-data para que Apache pueda leer y escribir lo que se crea
artisan() {
  su -s /bin/sh www-data -c "php artisan $*"
}

artisan package:discover --ansi

if [ "$DB_CONNECTION" = "mysql" ]; then
  # Base externa: solo migrar
  artisan migrate --force || echo "Aviso: la migración falló, revisa las variables DB_*"
else
  # SQLite local: el archivo se pierde al reiniciar, así que se recrea y se siembra en cada arranque
  export DB_CONNECTION=sqlite
  touch database/database.sqlite
  chown -R www-data:www-data database
  artisan migrate --force --seed || echo "Aviso: falló la migración o el seeder"
fi

exec apache2-foreground
