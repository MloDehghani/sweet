FROM php:7.4-fpm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql bcmath

# Set working directory
WORKDIR /var/www

# Add user for laravel application
RUN groupadd -g 1000 app
RUN useradd -u 1000 -ms /bin/bash -g app app

# Change current user to www
USER app
