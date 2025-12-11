# Imagen con PHP + Apache
FROM php:8.2-apache

# Copia los archivos del proyecto al servidor web
COPY . /var/www/html/

# Habilitar extensiones necesarias (opcional)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Exponer el puerto que Render usa
EXPOSE 10000

# Cambiar el puerto de Apache al que Render asigna
RUN sed -i 's/80/10000/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:10000/g' /etc/apache2/sites-enabled/000-default.conf

# Iniciar Apache
CMD [ "apache2-foreground" ]