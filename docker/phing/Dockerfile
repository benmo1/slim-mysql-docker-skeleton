FROM php:alpine

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php && \
        mv composer.phar /usr/local/bin/composer;

RUN curl -sS https://www.phing.info/get/phing-latest.phar > phing-latest.phar && \
    chmod +x phing-latest.phar && \
    mv phing-latest.phar /usr/local/bin/phing

ENTRYPOINT ["phing"]
