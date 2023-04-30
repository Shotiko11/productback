# build a Docker image

# specifies the base image
FROM php:8.1.0-fpm

# installs some packages
RUN apt update && apt install -y \
    git \
    curl \
    zip \
    vim \
    unzip

# installs Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# installs the PHP PDO extension
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www