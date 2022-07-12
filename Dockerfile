FROM php:apache-buster

COPY ./www /var/www/html
RUN chmod 755 /var/www/html

RUN apt-get update
RUN apt-get install nano
RUN apt-get install tree
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80
WORKDIR /var/www/html

