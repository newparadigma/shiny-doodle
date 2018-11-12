FROM php:fpm

RUN docker-php-ext-install pdo_mysql \
    && apt update \
    && apt install zip unzip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
