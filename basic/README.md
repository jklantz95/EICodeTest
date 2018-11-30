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

### Directory Structure of important files

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
        /loghelper.php - page to process data of a specific log into the db
        /ipinfo.php - allows search for specific ip, shows info from a GeoIP API and shows hits for that ip
        
        
### Homepage

This page displays the basic info, each location that obtained atleast 1 hit, and the total number of its
each location got.

Each location presented on this page allows a user to click on it, this will send them to a page that displays hit information
specific to that location.

This page also displays a simple graph of this data, I couldn't figure out if I liked displaying a bar graph or pie chart
more so I decided to let a user view both using a tab.

### Log Processor

There is a database section to maintain log information. I wanted to let a user view information on a specific log that is in the back end, So I made a selector/ processor page.

This page lets a user select a log file from the log directory in the back end and replace the current log data in the db with this data. After it parses a log and processes it, it returns the user to the home page.

### Location Info

From the homepage a user may click on a location and send them to this page. It shows a grid view of each hit this location recieved and information about each hit.

### IP Info

This page shows specific information about an IP address. A user may use the search bar to look up a specific IP address or can navigate here by clicking on
an IP address in the location info page. 

The first grid on this page shows additional info about a specific IP address, obtained from using a GeoIP API.

This implementation uses the GeoIP API from the following.

https://ipstack.com/

The other grid in the page shows all of the hits that were made by that specific IP address.

        

