<?php
include 'include/db.php';	/* CONNECT TO THE DB */
include 'chgfriends.php';	/* ADD DELETE FRIENDS CODE */
include "include/checksession.php";
if (! isset($_SESSION['id'])) {
	header("location: signin.php");
}	

$query = "SELECT * FROM users WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
if (mysql_num_rows($result) == 1) { 
	$row = mysql_fetch_assoc($result);
	$from = $row['email'];		/* GET THE EMAIL ADDRESS */
}

if ($_POST['invite']) {
	/*
 	 * IF WE'RE ADDING A FRIEND, GENERATE INVITE CODE AND SHOOT OFF AN EMAIL
 	 * AND ADD A RECORD IN THE PENDING FRIEND TABLE
 	 * MAYBE ADD A FRIEND SHOULD WORK INSTANTLY FOR NOW... THEN BY EMAIL
 	 */
	$insert = $_POST['invite'];

	/* WE NEED TO GET THE ID TO ADD... CHECK FOR username AND EMAIL */
	if (strchr($insert, '@')) {	/* EMAIL */
		$query = "SELECT * FROM users WHERE email = \"$insert\"";
	}
	else {
		$query = "SELECT * FROM users WHERE login = \"$insert\"";
	}
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	if (mysql_num_rows($result) == 1) {     /* THEY'RE ALREDY IN */
		$row = mysql_fetch_assoc($result);
		$insert=$row['email'];
		invite($id, $from, $insert, NULL); 
	}
	else {					/* NOT IN how:now YET */
		if (strchr($insert, '@')) {	/* EMAIL */
			invite($id, $from, $insert, "NEW"); 
		}
	}
}
else if ($_POST['delete']) {
	$delete = $_POST['delete'];
	delfriend($id, $delete);	/* DELETE FRIEND FROM BOTH */
	delfriend($delete, $id);	/* DELETE FRIEND FROM BOTH */
}

header("location: dofriends.php");
?>
