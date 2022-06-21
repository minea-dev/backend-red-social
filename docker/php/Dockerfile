# Parámetros recibidos del docker-compose
ARG php_version

# Instalación de php
FROM php:${php_version}

# Dependencias
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite