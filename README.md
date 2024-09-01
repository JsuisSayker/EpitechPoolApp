# new install

## install dependency

```sh
composer install
npm install
```

## setup environment

```sh
cp .env.example .env
```

## generate app key

```sh
php artisan key:generate
```

## create database

```sh
php artisan migrate
```

## for production

```sh
APP_DEBUG=false
```

## docker

```sh
docker compose up --build -d
```
