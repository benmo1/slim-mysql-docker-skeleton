FROM php:alpine

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && \
        mv composer.phar /usr/local/bin/composer;

ENTRYPOINT ["composer"]
