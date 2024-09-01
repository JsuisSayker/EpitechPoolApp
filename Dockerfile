# Use PHP with Apache as the base image

FROM node:alpine as npm-dependencies
# Set the working directory
WORKDIR /var/www/html/
COPY package.json package.json
COPY package-lock.json package-lock.json
RUN npm install


# FROM composer:latest as composer-build
# RUN apk update \
#     && apk add \
#     libxml2-dev \
#     php-soap \
#     && rm -rf /var/cache/apk/*
# RUN docker-php-ext-install \
#     bcmath \
#     exif \
#     soap
# WORKDIR /app
# RUN composer global require hirak/prestissimo \
#     --prefer-dist \
#     --prefer-stable \
#     --no-progress \
#     --no-scripts \
#     --no-suggest \
#     --no-interaction \
#     --ansi
# COPY --from=npm-dependencies /app /app
# COPY auth.json auth.json
# COPY composer.json composer.json
# COPY composer.lock composer.lock
# RUN composer install --prefer-dist --no-scripts --no-dev --no-autoloader && rm -rf /root/.composerCOPY . /appRUN composer dump-autoload --no-scripts --optimize

# FROM php:8.2-apache as web
FROM debian:12-slim

# Install Additional System Dependencies
RUN apt-get update -y
RUN apt-get install -y --no-install-recommends \
    curl \
    php \
    php-xml \
    php-dom \
    php-sqlite3 \
    composer \
    npm \
    unzip \
    git
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Set the working directory
WORKDIR /var/www/html/

COPY --from=npm-dependencies /var/www/html/ /var/www/html/

# COPY artisan composer.json composer.lock package.json /var/www/html/
# COPY bootstrap/ /var/www/html/bootstrap/
# RUN chown -R www-data:www-data /var/www/html/

# Change user
# USER www-data

# Copy the application dependencies
COPY . /var/www/html/

# Install project dependencies
RUN composer install

# Copy the application code
# COPY . /var/www/html

# Run app
ENTRYPOINT [ "php", "artisan", "serve", "--host=0.0.0.0" ]
