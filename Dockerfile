FROM php:7.2

WORKDIR /api_lib

RUN pecl install redis && docker-php-ext-enable redis

CMD ["php", "tests/ApiTest.php"]