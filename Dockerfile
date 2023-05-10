FROM php:8.0.19-apache-buster

RUN apt update -y && apt upgrade -y && apt install wget -y && docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

RUN wget https://getcomposer.org/download/2.4.2/composer.phar

RUN mv composer.phar /usr/local/bin/composer

RUN chmod a+x /usr/local/bin/composer

