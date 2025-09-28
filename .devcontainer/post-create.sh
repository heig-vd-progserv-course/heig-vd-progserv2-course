#!/usr/bin/env sh

## Configure Bash aliases
tee -a ~/.bash_aliases > /dev/null <<"EOF"
alias tree='tree --dirsfirst -A -F'
EOF

## Install required packages
# Update packages list
sudo apt update

# Install common packages
sudo apt install --yes neovim

# Install packages to optimize images (jpegoptim, optipng)
sudo apt install --yes jpegoptim optipng

# Install packages to optimize documents (ps2pdf)
sudo apt install --yes ghostscript

# Install packages to interact with SQLite databases
sudo apt install --yes sqlite3 php-sqlite3

# Install Apache server and PHP
sudo apt install --yes php-common libapache2-mod-php php-cli

# Install MariaDB client and server
sudo apt install --yes mariadb-client mariadb-server php-mysql

## Configure Apache server
# Remove the default document root
sudo rm -rf /var/www/html

# Create symbolic link to the document root
sudo ln -s /workspace /var/www/html

# Change port from 80 to 8080
sudo sed -i 's/80/8080/' /etc/apache2/ports.conf
sudo sed -i 's/:80>/:8080>/' /etc/apache2/sites-available/000-default.conf

# Display all PHP errors
sudo sed -i 's/display_errors = Off/display_errors = On/' /etc/php/*/apache2/php.ini

## Configure MariaDB server
# Start MariaDB server
sudo service mysql start

# Set a password for the root user and remove anonymous users and test database
#sudo mariadb-secure-installation

# Create a database and a user for the application
sudo mariadb --execute="CREATE DATABASE IF NOT EXISTS myapp CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
sudo mariadb --execute="CREATE USER IF NOT EXISTS 'user'@'localhost' IDENTIFIED BY 'password';"
sudo mariadb --execute="GRANT ALL PRIVILEGES ON myapp.* TO 'user'@'localhost';"
sudo mariadb --execute="FLUSH PRIVILEGES;"
