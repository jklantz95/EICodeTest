mysql -u root -pmyEtailpassword << EOF
create database testdata;
use testdata;
CREATE TABLE locations ( ip varchar(255), location varchar(255));
CREATE TABLE logData ( location varchar(255), ip varchar(255), date varchar(255), request varchar(255), status int, referer varchar(255), user_agent varchar(255));
LOAD DATA LOCAL INFILE 'location_db.txt' INTO TABLE locations FIELDS TERMINATED BY ':' IGNORE 2 LINES;
EOF
