#!/bin/sh
# Container boot: refuse to serve without APP_KEY, then optionally migrate.
# Docker Compose injects env vars; a .env file is optional inside the image.
set -eu

cd /var/www/html

if [ -z "${APP_KEY:-}" ]; then
  echo "FATAL: APP_KEY is empty. Generate one with php artisan key:generate and set it as a secret." >&2
  exit 1
fi

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache || true

if [ "${RUN_MIGRATIONS:-false}" = "true" ]; then
  php artisan migrate --force --no-interaction
fi

if [ "${APP_ENV:-production}" = "production" ]; then
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
fi

exec /usr/bin/supervisord -c /etc/supervisord.conf
