<?php
/* 
 * Connecting, selecting database
 * GONNA NEED TO SELECT A USERNAME FOR DB STUFF ONLY
 */

include 'include/db.php';
include 'include/checksession.php';
include 'gw/confirm.php';

$login = $_POST["login"];
$pw = $_POST["password"];

if (! $login) {		# IF THERE'S NO LOGIN, IT'S A LOGOUT
	session_destroy();
	header ("Location: index.php"); 
	exit;
}

/* HANDLE A NEW USER - MAY HAVE A CONF CODE BECAUSE ARRIVED DUE TO A FRIEND REQUEST
 */

if ($_POST["email"]) {	/* IT'S A NEW USER */
	$email = $_POST['email'];
	/* print "it's a new user"; */
	$query = "SELECT * FROM users WHERE login = \"$login\"";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	if (mysql_num_rows($result) != 0) {
		/* USER ALREADY EXISTS */
		$loginerror = $pr_nametaken;
		include 'signup.php';
		# header("Location: signup.php");
		exit;
	}
	else { 		/* ADD A NEW USER */
		$query = "SELECT * FROM users WHERE email = \"$email\"";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		if (mysql_num_rows($result) != 0) {
		/* EMAIL ALREADY EXISTS */
			$loginerror = $pr_emailtaken;
			include 'signup.php';
			# header("Location: signup.php");
			exit;
		}
		/* print "add new user $login, $pw, $email"; */
		$query = "INSERT INTO users (login, password, email, lang) 
		VALUES ('$login', '$pw', '$_POST[email]', '$lang')";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
/*
		$query = "SELECT * FROM users WHERE login = \"$login\"";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		$row = mysql_fetch_assoc($result);
*/
		$id = $row['id'];
		$bday = $row['bday'];
		$lang = $row['lang'];
		$newid=$id;

		$_SESSION['id']=$id;
		$_SESSION['name']=$login;
		$_SESSION['lang']=$lang;

		/* IF WE GOT A CONF CODE, THEN DO CONFIRM */
		$conf=$_POST['conf'];
		if ($conf) confirm($email, $conf);
	}
}

/* NEW USERS DROP THRU TO HERE - AND HOPEFULLY WILL WORK */

if ($login) {
	$query = "SELECT * FROM users WHERE login = \"$login\" AND password = \"$pw\"";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$row = mysql_fetch_assoc($result);
	$id = $row['id'];
	$bday = $row['bday'];
	$lang = $row['lang'];
	/* print "It's a login [$id]";  */

	if (mysql_num_rows($result) != 0) {
		/* print "login OK"; */
		$loginerror = "";
		/* USER AND PASSWORD OK */
		$_SESSION['id']=$id;
		$_SESSION['name']=$login;
		$_SESSION['lang']=$lang;
		if ($_POST["email"]) include 'settings.php';
		else include 'input.php';
	}
	else {
		/* print "Invalid login"; */
		$loginerror = $pr_invalidlogin;
		include 'index.php';
	}
}
