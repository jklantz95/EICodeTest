### Set Up

The following is a brief guide to set up and run this application

The following uses a linux command line

1 -  Install and set up a mysql server

sudo apt-get update

sudo apt-get install mysql-server

 service mysqld start
 
2 -  Install basic php packages

The following site suggests these packages

https://howtoubuntu.org/how-to-install-lamp-on-ubuntu

sudo apt install php-pear php-fpm php-dev php-zip php-curl php-xmlrpc php-gd php-mysql php-mbstring php-xml libapache2-mod-php

3 - Clone the repo into a local folder and cd into the basic directory

If you don't have composer installed then run

composer install

otherwise just run

composer update

4 - edit db/db.php and db/dbconfig.sh with your database credentials

run the script file db/dbconfig.sh 

./dbconfig.sh

This will initialize the database and the tables needed for this application

5 -  Run the server

php yii serve

connect using localhost:8080

### Directory Structure and important files

    /config
       /db.php - make sure to edit with your db info
       /dbconfig.sh - script shell file for initiating db
       /location_db.txt - the list file of ips to location 
    /controllers
      /SiteController.php - basic controller between models and views
    /logs - Contains the access logs
      /access_log.txt - current and only log of access data
    /models
      /processLog.php - model responsible for processing log data into db
      /RequestInfo.php - model responsible for retrieving info for index and location info pages 
    /views
      /site
        /index.php - homepage that displays hit per location info
        /locationinfo.php - page to display specific info for a location
        /loghelper.php page to process data of a specific log into the db

