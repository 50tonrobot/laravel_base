#!/bin/bash

#if composer is not found globally
if [ ! -f /usr/local/bin/composer ]; then
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');";
  php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;";
  php composer-setup.php;
  php -r "unlink('composer-setup.php');";
  mv composer.phar /usr/local/bin/composer;
fi

#if .env.example does exist
# probably means brand new installation
if [ -f /app/base/.env.example ]; then
  rm -rf /app/base/.env.example

fi

#always safe to see if env is fresh
mv /home/env /app/base/.env

# needs to be in /app base from this point forward
cd /app/base

# if no vendor directory, then needs installing
if [ ! -d "/app/base/vendor" ]; then
  composer update
  composer install
fi


#always safe to create new key
php artisan key:generate

# if no vendor directory, then needs installing
if [ ! -d "/app/base/vendor" ]; then
  php artisan migrate
fi

#spin up server, always
php artisan serve --host=0.0.0.0 --port=80
