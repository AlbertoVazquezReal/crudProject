## CRUD API-REST

### REQUISITOS PARA LA INSTALACIÓN###

-Ubuntu 22.04.3 LTS
-PHP 8.1.2
-mariadb Ver 15.1
-Composer 2.2.6
-Laravel Framework 10.25.1

### INSTRUCCIONES PARA LA INSTALACIÓN###

-Desde la raíz del proyecto, ejecutar el comando "php artisan migrate".

-Desde la raíz del proyecto, ejecutar el comando "php artisan serve".

### INSTRUCCIONES PARA EJECUTAR TEST UNITARIOS###

-Desde la raíz del proyecto, ejecutar el comando "sh exectest.sh", esto realizará un "migrate:rollback" para limpiar la BBDD, posteriormente realizará un "migrate" para generar el esquema necesario. A continuación, ejecutará los test unitarios reflejados en el fichero "tests/Unit/TestCase.php"

##UPDATE/UPGRADE
sudo apt-get update

sudo apt-get upgrade

##INSTALL PHP

sudo apt-get install -y php8.1-cli php8.1-common php8.1-mysql php8.1-zip php8.1-gd php8.1-mbstring php8.1-curl php8.1-xml php8.1-bcmath

##INSTALL MARIADB

sudo apt install mariadb-server

sudo systemctl start mariadb.service

##INSTALL COMPOSER

curl -sS https://getcomposer.org/installer | php

sudo mv composer.phar /usr/local/bin/composer

sudo chmod +x /usr/local/bin/composer

composer create-project laravel/laravel example-app

##CLONE PROJECT

mkdir /var/www/html

cd /var/www/html/

git ...

##INSTALL LARAVEL

cd /var/www/html/

composer install

php artisan serve







