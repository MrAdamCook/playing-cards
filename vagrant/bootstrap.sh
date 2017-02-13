#!/usr/bin/env bash

# update / upgrade
sudo apt-get update
sudo apt-get -y dist-upgrade


# install PHP
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php7.0
sudo apt-get install -y php-pear
sudo apt-get install -y php-xml php7.0-xml
sudo apt-get install -y php7.0-dev

# install XDebug
cd /usr/src
sudo wget http://xdebug.org/files/xdebug-2.5.0.tgz
sudo tar -xzf xdebug-2.5.0.tgz
cd xdebug-2.5.0
sudo phpize
sudo ./configure --enable-xdebug
sudo make install
sudo cp modules/xdebug.so /usr/lib/php/20151012
sudo bash -c 'sudo cat > /etc/php/7.0/mods-available/xdebug.ini << EOF
; configuration for php XDebug module
;extension=xdebug.so
zend_extension=/usr/lib/php/20151012/xdebug.so
xdebug.remote_enable=1;
xdebug.profiler_enable=0;
xdebug.profiler_enable_trigger=1;
xdebug.profiler_output_dir=/vagrant/cache/webgrind;
EOF'
sudo ln -s /etc/php/7.0/mods-available/xdebug.ini /etc/php/7.0/apache2/conf.d/20-xdebug.ini
sudo ln -s /etc/php/7.0/mods-available/xdebug.ini /etc/php/7.0/cli/conf.d/20-xdebug.ini
sudo service apache2 restart


# install PHPUnit
sudo apt-get install -y phpunit
sudo apt-get update
