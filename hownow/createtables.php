<?php
// Make a MySQL Connection
mysql_connect("localhost", "root", "doodoo99") or die(mysql_error());
mysql_query("DROP DATABASE emo");

mysql_query("CREATE DATABASE emo");
mysql_select_db("emo") or die(mysql_error());

mysql_query("DROP TABLE emotags");
mysql_query("DROP TABLE pendingfriends");
mysql_query("DROP TABLE friends");
mysql_query("DROP TABLE users");

mysql_query("CREATE TABLE emotags(
id INT, 
E INT, 
count INT,
added TIMESTAMP, 
why VARCHAR(30), 
tag VARCHAR(30)
 )")
or die(mysql_error());  

mysql_query("CREATE TABLE pendingfriends(
fromfriend  VARCHAR(30), 
tofriend  VARCHAR(30), 
replyfrom  VARCHAR(30), 
asked TIMESTAMP, 
replied TIMESTAMP, 
authcode INT
 )")
or die(mysql_error());  


mysql_query("CREATE TABLE friends(
id INT,
login VARCHAR(30), 
friend VARCHAR(1024), 
last INT,
prev INT,
now TIMESTAMP
 )")
or die(mysql_error());  

// Create a MySQL table in the selected database
mysql_query("CREATE TABLE users(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 login VARCHAR(30), 
 password VARCHAR(30), 
 email VARCHAR(30), 
 lang VARCHAR(30), 
count INT,
 bday DATE,
 city VARCHAR(30), 
 telno VARCHAR(30), 
 twitter VARCHAR(30)
 )")
 or die(mysql_error());  

echo "Done\n!";

?>
