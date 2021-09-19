FROM php:8.0-alpine

RUN docker-php-ext-install mysqli

COPY docker/php.ini /usr/local/etc/php/conf.d/php.ini
COPY . /app
WORKDIR /app

CMD php -S 0.0.0.0:8080 -t .