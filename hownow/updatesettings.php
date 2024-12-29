<?php
set_include_path(get_include_path() . ':/usr/local/lib/php');
# set_include_path(':/usr/local/lib/php');

# require_once('Arc90/Service/Twitter.php');
include 'include/db.php';	/* CONNECT TO THE DB */
include "include/checksession.php";
if (! isset($_SESSION['id'])) {
        header("location: signin.php");
	exit;
}
/*
 * OK - UPDATE THE DATABASE, DO A QUERY AND GENERATE THE CHART FILE
 * NEED TO BE LOGGED IN FOR THIS TO WORK
 * TROUBLE WITH USING COOKIES FOR ID WHEN GOING BACK TO MAIN PAGE.
 * DON'T KNOW WHY
 */

/*
 * CHECKBOXES ARE ONLY SENT ACROSS IF CHECKED 
 * THEY ARE SET TO "on"
 * IS IT POSSIBLE THAT 0 DOESN'T WORK AS A VALUE?
 */

if ($_POST['lang']) {	
	# print "LANG IS SET!";
	$upd = "lang='" . $_POST[lang] . "'";
	$_SESSION['lang'] = $_POST[lang];	/* CHG LANGUAGE */
}
# else print "LANG IS NOT SET";
if ($_POST['s1_title']) {			/* STOPPED SOMETHING */
	
	$stop=$_POST['byr1'] . "-" . $_POST['bmon1'] . "-" . $_POST['bday1'];

	if ($upd) {
		$upd = $upd . " , s1='" .  $stop . "'";
		$upd = $upd . " , s1_title='" .  $_POST[s1_title] . "'";
	} 
	else {
		$upd = " s1='" .  $stop . "'";
		$upd = " s1_title='" .  $_POST[s1_title] . "'";
	}
}

if ($_POST['bday']) {			/*  ENVIRONMENT - BIORHYTHMS */
	
	$birth=$_POST['byr'] . "-" . $_POST['bmon'] . "-" . $_POST['bday'];

	if ($upd) {
		$upd = $upd . " , bday='" .  $birth . "'";
	} 
	else {
		$upd = $upd . " , bday='" .  $birth . "'";
	}
	// print "MADE IT TO E1\n";
}


if ($_POST['city']) {			/*  ENVIRONMENT - WEATHER */
	if ($upd) {
		$upd = $upd . " , city='" .  $_POST[city] . "'";
	} 
}

if ($_POST['telno']) {			/*  ENVIRONMENT - WEATHER */
	if ($upd) {
		$upd = $upd . " , telno='" .  $_POST[telno] . "'";
	} 
}

if ($_POST['twitter']) {
	$twuser = $_POST['twitter'];
	if ($upd) {
		$upd = $upd . " , twitter='" .  $_POST[twitter] . "'";
	} 
}


$query = "SELECT * FROM users WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
# print $result;

/* NOW INSERT THE EMODATA INTO THE DB */
$row = mysql_fetch_assoc($result);
$id = $row['id'];
/* SMM DISABLE TWITTER FOR NOW
if ($twuser) {	
	$twitter = new Arc90_Service_Twitter('how_now', 'doodoo69');

	$oldtwuser = $row['twitter'];
	if ($oldtwuser) $resp = $twitter->destroyFriendship($oldtwuser, $format ='json');
	$resp = $twitter->createFriendship($twuser, $format ='json');
}
*/

$query = "UPDATE users SET $upd WHERE id = \"$id\"";
# print "QUERY: $query\n";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

/* NOW UPDATE THE ROW WITH POSSIBLY NEW VALUES */
$query = "SELECT * FROM users WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

/* NOW INSERT THE EMODATA INTO THE DB */
$row = mysql_fetch_assoc($result);
$id = $row['id'];
$lang = $row['lang'];
$bday = $row['bday'];

/* IF WE HAVE A GRAPH TO SHOW, GO THERE, OTHERWISE GET INPUT */
$file = "public/" . $id . ".big." . $graph . ".png";
if (! file_exists( $file  )) {
        $start='contact';
}
include 'input.php';
?>
