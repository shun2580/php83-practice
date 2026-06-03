FROM php:8.3.9-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pcntl

RUN a2enmod rewrite

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

WORKDIR /var/www/html

COPY public/   ./public/
COPY problems/ ./problems/
COPY tests/    ./tests/
COPY src/      ./src/

RUN chown -R www-data:www-data /var/www/html
