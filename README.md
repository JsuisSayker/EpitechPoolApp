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

### run compose

```sh
docker compose up --build -d
```

### build

```sh
docker build -t tommendy/epitechpoolapp --build-arg ADMIN_EMAIL=[EMAIL] --build-arg ADMIN_PASSWORD=[PASSWORD] .
```

### run container

```sh
docker run -p '8000:80' tommendyepitechpoolapp
```
