FROM php:7.1
ENV \
  APP_DIR="/app/base" \
  APP_PORT="80"
ADD ./app/. /app
COPY config/php.ini /usr/local/etc/php

RUN apt-get update && apt-get install -y \
    vim locate mysql-client \
    git zip unzip zlib1g-dev openssl libxml2-dev \
    libmemcached-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install xml \
#    && pecl install memcached-2.2.0 \
#    && docker-php-ext-enable memcached \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql
COPY config/env /home/env
COPY config/init.sh /usr/local/bin/init.sh
COPY config/wait-for-mysql.sh /usr/local/bin/wait-for-mysql.sh
RUN chmod +x /usr/local/bin/init.sh \
   && chmod +x /usr/local/bin/wait-for-mysql.sh
