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

/opt/alt/php83/usr/bin/php /usr/local/bin/composer install --no-dev

/opt/alt/php83/usr/bin/php artisan key:generate

#npm install
#npm run prod

/opt/alt/php83/usr/bin/php artisan optimize

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
