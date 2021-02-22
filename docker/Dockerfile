FROM php:7.4.3-fpm-alpine

LABEL mantainer="miked@threedev.io"
LABEL description="Lumen Microservice GCP Run container"

ENV build_deps \
        autoconf \
        libzip-dev \
        curl-dev \
        oniguruma-dev

ENV persistent_deps \
        build-base \
        git \
        unzip \
        curl \
        g++ \
        gcc \
        make \
        mysql-client \
        php-xml \
        php-zip \
        rsync \
        nginx

WORKDIR /var/www
COPY . /var/www
COPY docker/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf

RUN chown -R www-data:www-data ./* \
    && chown -R www-data:www-data ./.* \
    && find . -type f -exec chmod 644 {} \; \
    && find . -type d -exec chmod 775 {} \;

# Install build dependencies
RUN apk upgrade && apk update && \
    apk add --no-cache --virtual .build-dependencies $build_deps

# Install persistent dependencies
RUN apk add --update --no-cache --virtual .persistent-dependencies $persistent_deps \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk update \
    && docker-php-ext-configure zip \
    && docker-php-ext-install mysqli \
        pdo \
        pdo_mysql \
        bcmath \
        curl \
        pcntl \
        zip \
        exif \
    && apk del -f .build-dependencies

USER www-data
EXPOSE 9000
CMD ["php-fpm", "--nodaemonize"]

