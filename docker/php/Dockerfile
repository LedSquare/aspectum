FROM php:8.2-fpm

ENV CACHE=--no-cache

RUN apk $CACHE update && apk $CACHE upgrade && apk $CACHE add bash 

# RUN apk add php php-mysql php-mbstring php-json php-xml php-curl php-zip php-gd

RUN docker-php-ext-install pdo_mysql  

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /site


