FROM composer:latest AS composer

FROM php:8.2-fpm-alpine

ENV CACHE=--no-cache

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /site

RUN apt-get $CACHE update && apt-get $CACHE install -y \
      apt-utils \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      git \
      wget \
      build-essential \
      libncursesw5-dev \
      libssl-dev \
      libsqlite3-dev \
      tk-dev \
      libgdbm-dev \
      libc6-dev \
      libbz2-dev \
      libffi-dev \
      zlib1g-dev && \
      docker-php-ext-install pdo_mysql
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip && \




