#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

sudo cp -v /etc/php/7.1/fpm/conf.d/20-xdebug.ini /etc/php/7.1/cli/conf.d/20-xdebug.ini
sudo cp -v /etc/php/7.0/fpm/conf.d/20-xdebug.ini /etc/php/7.0/cli/conf.d/20-xdebug.ini
sudo cp -v /etc/php/5.6/fpm/conf.d/20-xdebug.ini /etc/php/5.6/cli/conf.d/20-xdebug.ini

echo "cd ~/Code" >> ~/.bashrc
chmod +x ~/.bashrc
cd ~/Code
php artisan migrate:refresh --seed
