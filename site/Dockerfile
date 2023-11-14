FROM php:8.2-apache

RUN apt-get update

# Install MySQL PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_mysql

RUN apt-get update -y && apt-get install -y libpng-dev libfreetype6-dev libyaml-dev

RUN  docker-php-ext-configure gd --with-freetype
RUN  docker-php-ext-install gd

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Install YAML extension
RUN pecl install yamL

RUN usermod -u 1000 www-data

RUN a2enmod rewrite
