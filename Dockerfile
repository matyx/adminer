FROM php:8.0-alpine

COPY . /app
WORKDIR /app

CMD php -S 0.0.0.0:8080 -t .