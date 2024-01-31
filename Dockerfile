FROM php:8.2-alpine

RUN set -ex && apk --no-cache add postgresql-dev
RUN docker-php-ext-install mysqli pgsql

COPY docker/php.ini /usr/local/etc/php/conf.d/php.ini
COPY . /app
WORKDIR /app

CMD php -S 0.0.0.0:8080 -t .