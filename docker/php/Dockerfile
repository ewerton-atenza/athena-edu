ARG PHP_VERSION=8
ARG COMPOSER_VERSION=latest

FROM composer:${COMPOSER_VERSION} AS composer
FROM php:${PHP_VERSION}-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

LABEL maintainer="Athena Edu <contato@atenza.digital>"

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_PROCESS_TIMEOUT 900
ENV COMPOSER_DISABLE_XDEBUG_WARN=1

ENV XDEBUG_IDEKEY=xdebug
ENV XDEBUG_CLIENT_HOST=host.docker.internal
ENV XDEBUG_CLIENT_PORT=9003
ENV XDEBUG_MODE=debug
ENV XDEBUG_START_WITH_REQUEST=off

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY custom.ini /usr/local/etc/php/conf.d/custom.ini
COPY www.conf /usr/local/etc/php-fpm.d/zzz-custom.conf

RUN apk add --update \
    libc-dev \
    libpng-dev  \
    libzip-dev  \
    linux-headers \
    openjdk8  \
    postgresql17-client \
    postgresql-dev \
    ttf-dejavu \
    unzip \
    openssh \
    git

RUN apk add --no-cache --virtual .phpize_deps $PHPIZE_DEPS

RUN pecl install \
    redis \
    xdebug

RUN docker-php-ext-enable \
    redis \
    xdebug

RUN docker-php-ext-install  \
    bcmath \
    gd \
    pcntl \
    pdo \
    pdo_pgsql \
    pgsql \
    zip \
    ftp

RUN docker-php-ext-enable  \
     bcmath \
     gd \
     pcntl \
     pdo \
     pdo_pgsql \
     pgsql \
     zip \
     ftp

RUN apk del .phpize_deps

RUN ln -s /var/www/ieducar/artisan /usr/local/bin/artisan

ARG HOST_UID
ARG HOST_GID

RUN addgroup -g ${HOST_GID} ieducar 2>/dev/null || addgroup ieducar && \
    adduser -u ${HOST_UID} -G ieducar -s /bin/sh -D ieducar 2>/dev/null || \
    adduser -G ieducar -s /bin/sh -D ieducar

USER ieducar

WORKDIR /var/www/ieducar
