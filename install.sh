#! /bin/bash

file=".env"
if [ -f "$file" ]
then
	echo "$file found"
else
	echo "$file not found"
	echo "copying .env.example"
    cp .env.example .env
fi

composer install --no-dev
php artisan key:generate

npm install
npm run prod

php artisan optimize

# database
database_file="database/database.sqlite"
if [ -f "$database_file" ]
then
	echo "$database_file found"
else
	echo "$database_file not found"
	echo "create database.sqlite"
    touch database_file
fi

php artisan migrate
