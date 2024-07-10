#! /bin/bash

git reset --hard

ssh-agent bash -c 'ssh-add ~/.ssh/zapleczowka_rsa; git pull'

/opt/alt/php83/usr/bin/php /usr/local/bin/composer install --no-dev
/opt/alt/php83/usr/bin/php artisan migrate --force
/opt/alt/php83/usr/bin/php artisan route:clear
/opt/alt/php83/usr/bin/php artisan view:clear
/opt/alt/php83/usr/bin/php artisan cache:clear
/opt/alt/php83/usr/bin/php artisan config:clear
