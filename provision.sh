#!/bin/bash

#PHP5.5 Install
sudo apt-get update
sudo apt-get install -y python-software-properties
sudo add-apt-repository ppa:ondrej/php5
sudo apt-get update && sudo apt-get dist-upgrade

#PHP Installs
sudo apt-get install -y php5-mysql
sudo apt-get install -y php5-curl
sudo apt-get install -y php5-mcrypt 
sudo apt-get install -y php5-cli
sudo apt-get install -y libapache2-mod-php5

#Install vim
sudo apt-get install -y vim
#tmux
sudo apt-get install -y tmux
#tmate
sudo add-apt-repository ppa:nviennot/tmate      && \
sudo apt-get update                             && \
sudo apt-get install -y tmate


#Install Apache
sudo apt-get install -y apache2
# Remove /var/www default
rm -rf /var/www
# Symlink /vagrant to /var/www
ln -fs /vagrant /var/www
# Add ServerName to httpd.conf
echo "ServerName localhost" > /etc/apache2/httpd.conf
# Setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
  DocumentRoot "/vagrant/public"
  ServerName localhost
  <Directory "/vagrant/public">
    AllowOverride All
    Require all granted
  </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-enabled/000-default.conf
# Enable mod_rewrite
a2enmod rewrite
# Restart apache
sudo service apache2 restart


#install curl
sudo apt-get install -y curl libcurl3
#Composer install
sudo curl -s https://getcomposer.org/installer | php
#global access
sudo mv composer.phar /usr/local/bin/composer

#MYSQL
export DEBIAN_FRONTEND=noninteractive
sudo -E apt-get install -q -y mysql-server-5.5

echo "CREATE DATABASE IF NOT EXISTS laravel_dev" | mysql
echo "CREATE USER 'will'@'localhost' IDENTIFIED BY ''" | mysql
echo "GRANT ALL PRIVILEGES ON *.* TO 'will'@'localhost' IDENTIFIED BY ''" | mysql
echo "FLUSH PRIVILEGES" | mysql

#Install git 
sudo apt-get install -f -y git

rm -rf /var/www
ln -fs /vagrant /var/www
cd /var/www
sudo chmod -R 775 /var/www/app/storage/
composer install
