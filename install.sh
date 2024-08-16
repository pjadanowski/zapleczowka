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

# database
database_file="database/database.sqlite"
if [ -f "$database_file" ]
then
	echo "$database_file found"
else
	echo "$database_file not found"
	echo "create database.sqlite"
    touch $database_file
fi

composer config platform.php 8.3.8

/opt/alt/php83/usr/bin/php /usr/local/bin/composer install --no-dev

#npm install
#npm run prod


/opt/alt/php83/usr/bin/php artisan storage:link
/opt/alt/php83/usr/bin/php artisan key:generate
/opt/alt/php83/usr/bin/php artisan migrate:fresh --seed 
/opt/alt/php83/usr/bin/php artisan optimize:clear

/opt/alt/php83/usr/bin/php artisan app:env-set-production
/opt/alt/php83/usr/bin/php artisan data:sync #synchronize all articles, links , etc...

echo "installation complete"