# Imagen base con PHP y Apache
FROM php:8.2-apache

# Instala extensiones necesarias (por si usas bases de datos o imágenes)
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Habilita mod_rewrite (útil si usas rutas amigables)
RUN a2enmod rewrite

# Copia todos los archivos del proyecto al servidor web
COPY . /var/www/html/

# Da permisos correctos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80
