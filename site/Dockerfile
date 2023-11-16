FROM php:8.2-apache

RUN apt-get update

# Install MySQL PDO for MariaDB compatibility
RUN docker-php-ext-install pdo_mysql

# Other Extensions and Configurations
RUN apt-get update -y && apt-get install -y libpng-dev libfreetype6-dev libyaml-dev
RUN docker-php-ext-configure gd --with-freetype
RUN docker-php-ext-install gd
RUN pecl install yaml
RUN usermod -u 1000 www-data
RUN a2enmod rewrite
