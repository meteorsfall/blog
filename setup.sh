#!/bin/bash

# Install dependencies
sudo apt-get install -y apache2 mysql-server php7.4 php7.4-mysql

# Setup mysql database and user
sudo mysql <<EOF
CREATE USER 'php'@'localhost' IDENTIFIED BY 'HsR0xf1eLJLqDC1YpJ8w';
CREATE DATABASE blog;
GRANT ALL PRIVILEGES ON blog.* TO 'php'@'localhost';
EOF

# Initialize the database tables with the schema
sudo mysql blog < db.sql

# Example database contents:
# INSERT INTO `Project` VALUES (1,'Misc','This is random stuff');
# INSERT INTO `Article` VALUES (3,'Yayyy','2019-02-13 03:14:02','Oh boy :D',1),(4,'Fixing the blog up after a year','2020-03-14 22:17:15','Want to add some more stuff.',1);

# Make the blog the new /var/www/html
sudo rm -r /var/www/html
sudo ln -s "$(pwd)" /var/www/html

# Enable the rewrite module
sudo a2enmod rewrite

# Enable .htaccess apache config overriding
sudo sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Reload apache2 so that the PHP module will start running, and .htaccess files work
sudo systemctl restart apache2

