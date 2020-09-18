#!/bin/sh
# Exit on fail
set -e
chmod -R 777 /app/storage

composer install

php-fpm
# Finally call command issued to the docker service
exec "$@"
