<?php
include '/home/www/docs/hownow/gw/confirm.php';
/*
 * CONFIRM A FRIEND
 * THIS ACCEPTS INPUT VIA EMAIL ON MAC TO THIS FORM HERE
 * ONLY INPUT IS REALLY THE CONFIRMATION NUMBER (MAYBE EMAIL ADDRESS AS WELL)
 */ 

if ($_POST['email']) {
	$email = $_POST['email'];
	if ($_POST['conf']) {
		$conf = $_POST['conf'];
	}
}
else if ($_GET['email']) {
	$email = $_GET['email'];
	if ($_GET['conf']) {
		$conf = $_GET['conf'];
	}
}

/* SMM TEST
$email="eating@twitanon.com";
$conf="788929";
*/
confirm($email, $conf);
header("location: ../input.php?section=friends");
?>
