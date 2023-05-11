# specifies the base image for PHP
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

# copies the PHP files into the container
COPY . /var/www/html/

# sets the working directory
WORKDIR /var/www/html

# exposes port 8000
EXPOSE 8000

# starts the PHP process
CMD ["php", "-S", "0.0.0.0:8000"]
