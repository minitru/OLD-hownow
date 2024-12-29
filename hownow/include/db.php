<?php
/* 
 * Connecting, selecting database
 * GONNA NEED TO SELECT A USERNAME FOR DB STUFF ONLY
 */
$link = mysql_connect('localhost', 'root', 'doodoo99')
    or die('Could not connect: ' . mysql_error());
/*
echo 'Connected successfully';
*/
mysql_select_db('emo') or die('Could not select database');
