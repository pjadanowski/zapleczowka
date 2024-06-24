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


#npm install
#npm run prod

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


/opt/alt/php83/usr/bin/php artisan key:generate
/opt/alt/php83/usr/bin/php artisan migrate
/opt/alt/php83/usr/bin/php artisan optimize

/opt/alt/php83/usr/bin/php artisan app:env-set-production

echo "installation complete"