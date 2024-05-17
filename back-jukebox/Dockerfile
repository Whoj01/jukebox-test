FROM php:8.3-fpm-alpine3.19

WORKDIR /var/www

# Instalando depêndencias do sistemas
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libzip-dev \
    zlib-dev \
    nodejs \
    npm

# Instalando extensões do PHP
RUN docker-php-ext-install gd \
    && docker-php-ext-install zip

# Instalando Postgres PDO
RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Definindo user
RUN adduser -D -h /home/jukebox_user -s /bin/bash jukebox_user

# Copiando o projeto
COPY . /var/www

RUN chown -R jukebox_user:jukebox_user /var/www/

USER jukebox_user

# Ultima versão do composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalando depêndencias
RUN composer require firebase/php-jwt
RUN composer install

RUN php artisan key:generate

RUN npm install

EXPOSE 9000