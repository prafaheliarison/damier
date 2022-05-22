FROM php:7.4-fpm-alpine
RUN rm -rf /var/cache/apk/* && \
    rm -rf /tmp/*
RUN apk update && \
    apk upgrade && \
    apk add git libmemcached-dev zlib-dev pcre-dev ${PHPIZE_DEPS} oniguruma-dev icu-dev npm libxml2-dev libzip-dev nano libpng-dev && \
    pecl install memcached-3.1.5 redis
    
RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql intl ctype bcmath fileinfo json pdo xml zip gd && \
docker-php-ext-enable memcached && \
docker-php-ext-enable redis && \
apk del pcre-dev ${PHPIZE_DEPS}

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH ~/.composer/vendor/bin:$PATH
RUN ln -sf /bin/bash /bin/ash

# Permission and cache
RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories
RUN apk --no-cache add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN rm -rf /var/cache/apk/*