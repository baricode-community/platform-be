FROM dunglas/frankenphp:php8.3

ENV SERVER_NAME=":80"

WORKDIR /app

COPY . .

RUN apt update && apt install zip && libzip-dev -y && \
    docker-php-ext-install zip && \
    docker-php-ext-enable zip

# Install Composer
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN composer install