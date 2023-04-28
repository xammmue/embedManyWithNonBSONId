FROM php:8.1-fpm-buster

EXPOSE 9000

RUN apt-get update \
    && apt-get install -y --no-install-recommends --no-install-suggests \
        bash \
        zip \
        unzip \
        libssh-dev \
        libicu-dev \
        pkg-config \
        supervisor \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && rm -rf /var/lib/apt/lists/*


# php extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install -j$(nproc) \
        bcmath \
        sockets \
        opcache \
        intl \
        gd

RUN pecl install mongodb xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-ext-enable mongodb

RUN ln -s /var/www/symfony /www
RUN rm -rf var/log/symfony/* docker-compose*

RUN mkdir -p /var/www/symfony && chown www-data:www-data /var/www/symfony

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
RUN mkdir  -p /var/www/.composer/    \
    && chown -R www-data:www-data /var/www/.composer

WORKDIR /var/www/symfony
USER www-data
#COPY --chown=www-data:www-data .bashrc /var/www/.bashrc
RUN php -v && php --ri mongodb

COPY --chown=www-data:www-data . /var/www/symfony