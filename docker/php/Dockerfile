FROM composer:latest AS composer
FROM node:20-alpine AS node

FROM php:8.2-fpm-alpine

ENV CACHE=--no-cache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /site

RUN apk $CACHE update && apk $CACHE add \
    bash \
    libzip-dev \
    zip \
    unzip \
    git \
    wget \
    build-base \
    libpng-dev \
    freetype-dev \
    libjpeg-turbo-dev \
    zlib-dev \
    libpq \
    libpq-dev \
    libffi-dev \
    openssl-dev \
    sqlite-dev \
    tk-dev \
    gdbm-dev \
    ncurses-dev \
    bzip2-dev \
    zlib-dev

RUN docker-php-ext-install pdo_mysql bcmath gd zip

COPY --from=node /usr/local/bin/node /usr/local/bin/
COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY laravel/package*.json ./

RUN apk $CACHE add npm
