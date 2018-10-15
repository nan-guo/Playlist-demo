FROM php:7.2-apache

WORKDIR /var/www

# Enable intl
RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++
RUN docker-php-ext-install intl

# Install wget
RUN  apt-get update && apt-get install -y wget && rm -rf /var/lib/apt/lists/*

# Install php-soap
RUN apt-get update -y && apt-get install -y libxml2-dev && apt-get clean -y
RUN docker-php-ext-install soap

# Install mcrypt libpng
RUN apt-get update -y && apt-get install -y libmcrypt-dev libpng-dev
RUN pecl install mcrypt-1.0.1
RUN docker-php-ext-enable mcrypt

# Install mbstring
RUN docker-php-ext-install mbstring

# Install gd
RUN docker-php-ext-install gd
RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
        openssl \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd

# Install curl
RUN apt-get install -y libssl-dev libcurl4-openssl-dev pkg-config
RUN docker-php-ext-install curl

# Install pgsql
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pgsql

# Install mysqli
RUN docker-php-ext-install mysqli

# Install pdo_pgsql
RUN docker-php-ext-install pdo_pgsql

# Install pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Install sockets
RUN docker-php-ext-install sockets

# Install pcntl
RUN docker-php-ext-install pcntl

# Install ftp
RUN docker-php-ext-install ftp

# Install opcache
RUN docker-php-ext-install opcache

# Install zip
RUN docker-php-ext-install zip

# Install APCu and APC backward compatibility
RUN pecl install apcu \
    && pecl install apcu_bc-1.0.3 \
    && docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini \
    && docker-php-ext-enable apc --ini-name 20-docker-php-ext-apc.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install Git
RUN apt-get update && apt-get install -y git

# Install Wget
RUN apt-get update && apt-get install -y wget

# Install Vim
RUN apt-get update && apt-get install -y vim

# Install zip & unzip
RUN apt-get update && apt-get install -y zip && apt-get install -y unzip

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

RUN mkdir -p /etc/apache2/external

# Setup system configurations
COPY php.ini /usr/local/etc/php/
COPY conf/apache2/*.conf /etc/apache2/sites-enabled/
RUN rm /etc/apache2/sites-enabled/000-default.conf

# Enable rewrite module
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

# Ensure www-data has necessary permission
RUN usermod -u 1000 www-data

RUN a2enmod rewrite
RUN a2enmod include

EXPOSE 80

COPY bin/bootstrap.sh /usr/local/bin/bootstrap.sh
CMD ["bootstrap.sh"]
