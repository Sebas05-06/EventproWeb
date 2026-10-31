#!/bin/sh
# Render indica el puerto en PORT; Apache debe escuchar ahí
PORT="${PORT:-10000}"
sed -ri "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

php artisan package:discover --ansi
php artisan migrate --force || echo "Aviso: la migración falló, revisa las variables DB_*"

exec apache2-foreground
