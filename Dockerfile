# Use PHP with Apache as the base image

FROM node:alpine as npm-dependencies
# Set the working directory
WORKDIR /var/www/html/
COPY package.json package.json
COPY package-lock.json package-lock.json
RUN npm install


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

# Copy the application dependencies
COPY . /var/www/html/

# Install PHP dependencies
RUN composer install

ARG ADMIN_EMAIL=test@example.com
ARG ADMIN_PASSWORD=password

ENV ADMIN_EMAIL=${ADMIN_EMAIL}
ENV ADMIN_PASSWORD=${ADMIN_PASSWORD}

# Prepare SQLite database
RUN touch database/database.sqlite

# Generate Laravel app key
RUN cp .env.prod .env
RUN php artisan key:generate

# Run migrations in production with force
RUN php artisan migrate --force --seed


# Run app
ENTRYPOINT [ "php", "artisan", "serve", "--host=0.0.0.0" ]
