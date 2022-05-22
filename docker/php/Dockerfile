# 1 Set master image
FROM php:7.4-fpm-alpine3.13

# 2 Set working directory
WORKDIR /var/www/project/backend

# 3 Install Additional dependencies
RUN apk update && apk add --no-cache \
build-base shadow vim curl \
php7 \
php7-fpm \
php7-common \
php7-pdo \
php7-pdo_mysql \
php7-mysqli \
php7-mcrypt \
php7-mbstring \
php7-xml \
php7-openssl \
php7-json \
php7-phar \
php7-zip \
php7-gd \
php7-dom \
php7-session \
php7-zlib

# 4 Add and Enable PHP-PDO Extenstions
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN docker-php-ext-enable pdo_mysql

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

ADD symfony.ini /etc/php7/conf.d/
ADD symfony.ini /etc/php7/cli/conf.d/
ADD xdebug.ini  /etc/php7/conf.d/

ADD symfony.pool.conf /etc/php7/php-fpm.d/
CMD ["php-fpm", "-F"]
