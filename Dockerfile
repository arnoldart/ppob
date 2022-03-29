FROM php:7.4-apache
RUN docker-php-ext-install mysqli

FROM tutum/lamp:latest
RUN rm -fr /app && git clone https://github.com/username/customapp.git /app
EXPOSE 80 3306
CMD ["/run.sh"]