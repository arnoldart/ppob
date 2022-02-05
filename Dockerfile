FROM php:7.4-apache
RUN docker-php-ext-install mysqli

RUN rm /var/www/html/index.html
COPY index.php /var/www/html/index.php