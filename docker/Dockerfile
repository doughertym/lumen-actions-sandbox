FROM php:7.4-cli

COPY . /usr/local/gv-ccb
WORKDIR /usr/local/gv-ccb

RUN pecl install xdebug && \
    docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-enable xdebug pdo pdo_mysql

EXPOSE 80 9000
CMD [ "php", "-S", "0.0.0.0:80", "-t", "public" ]
