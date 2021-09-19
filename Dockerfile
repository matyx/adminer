FROM php:8.0-alpine

RUN docker-php-ext-install mysqli

COPY . /app
WORKDIR /app

CMD php -S 0.0.0.0:8080 -t .