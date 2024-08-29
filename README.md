# new install

## install dependency

```sh
composer install
npm install
```

## generate app key

```sh
echo 'APP_KEY=' > .env
php artisan key:generate
echo '' >> .env
```

## create database

```sh
touch "${PWD}/database/database.sqlite"
chmod 664 "${PWD}/database/database.sqlite"
echo 'DB_CONNECTION=sqlite' >> .env
echo "DB_DATABASE=${PWD}/database/database.sqlite" >> .env
php artisan migrate:fresh --seed
```

## for dev

```sh
echo 'APP_ENV=local' >> .env
echo 'APP_DEBUG=true' >> .env
```
