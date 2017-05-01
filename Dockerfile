FROM php:7.1
RUN apt-get update && apt-get install -y \
    vim locate mysql-client \
    git zip unzip zlib1g-dev openssl libxml2-dev \
    && docker-php-ext-install zip mbstring tokenizer xml mysqli pdo_mysql \
    && docker-php-ext-enable pdo_mysql mysqli

CMD ["php", "-a"]

#build this image
# docker build -t laravel-ready:1 .
