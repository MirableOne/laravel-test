FROM php:8.2-fpm

RUN apt-get update && apt-get install -y libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql
