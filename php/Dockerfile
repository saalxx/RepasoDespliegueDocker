FROM php:8.2-apache

# Instala y habilita la extensión mysqli
RUN docker-php-ext-install mysqli \
    && docker-php-ext-enable mysqli

# Copia la aplicación al contenedor
COPY . /var/www/html/mi_app_cine
