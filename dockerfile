FROM wordpress:latest
RUN chown -R www-data:www-data /var/www/html

RUN apt-get update && \
  apt-get install -y git && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
  composer require --dev phpunit/phpunit

WORKDIR /var/www/html