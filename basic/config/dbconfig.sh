mysql -u root -pmyEtailpassword << EOF
create database testdata;
use testdata;
CREATE TABLE locations ( ip text NOT NULL, location text NOT NULL);
LOAD DATA LOCAL INFILE 'location_db.txt' INTO TABLE locations FIELDS TERMINATED BY ':' IGNORE 2 LINES;
EOF
