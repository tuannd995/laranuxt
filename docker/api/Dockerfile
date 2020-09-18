FROM php:7.4.4-fpm-alpine
WORKDIR /

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apk update && apk add \
  git \
  wget \
  freetype \
  freetype-dev \
  libpng-dev \
  jpeg-dev \
  libzip-dev \
  zip \
  unzip \
  openssh \
  autoconf 

RUN  docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg && \
        docker-php-ext-install gd opcache pdo_mysql && \
        docker-php-ext-configure zip && \
        docker-php-ext-install zip

ENV PHPREDIS_VERSION 3.0.0

RUN mkdir -p /usr/src/php/ext/redis \
    && fc-cache -f -v \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

COPY ./docker-entrypoint.sh /docker-entrypoint.sh
COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

ARG DOCKER_UID
ARG DOCKER_GID
RUN if [ ${DOCKER_UID:-0} -ne 0 ] && [ ${DOCKER_GID:-0} -ne 0 ]; then \
    deluser www-data &&\
    if getent group www-data ; then delgroup www-data; fi &&\
    addgroup -g ${DOCKER_GID} www-data &&\
    adduser -u ${DOCKER_UID} -G www-data www-data --disabled-password &&\
    install -d -m 0755 -o www-data -g www-data /home/www-data \
;fi

RUN apk add --no-cache openssl

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-alpine-linux-amd64-$DOCKERIZE_VERSION.tar.gz

RUN curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer

WORKDIR /app


