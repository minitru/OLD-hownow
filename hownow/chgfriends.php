<?php

function delfriend($from, $del) {
	/*
 	 * IF WE'RE DELETING A FRIEND, GRAB THE FRIEND LIST, EXPLODE IT, REMOVE 
 	 * THE NAME, AND REPLACE IT... AND REMEMBER TO DO THE SAME FOR THE OTHER
 	 * PERSON SINCE FRIENDING IS RECIPROCAL
 	 */
	/* UPDATE THE FRIENDS TABLE */
	$query = "SELECT * from friends where id = $from";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	if (mysql_num_rows($result) == 1) {	/* FOUND IT */
		$row = mysql_fetch_assoc($result);
		$friends = explode(",",$row['friend']);
	
		/* NOW SQUISH ALL THOSE IDS INTO A NEW QUERY */
		foreach ($friends AS $friend) {
			if ($friend != "$del") {
        			if (!$allfriends) $allfriends = "$friend";
        			else $allfriends = $allfriends . "," . $friend;
			}
		}                               
	
		$query = "UPDATE friends set friend = '$allfriends' WHERE id = $from";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	}
}

function addfriend($from, $add) {
	$query = "SELECT * from friends where id = '$from'";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	
	if (mysql_num_rows($result) == 0) {	/* NO FRIENDS YET */
		$query = "SELECT * from users where id = '$from'";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		if (mysql_num_rows($result) == 1) {	/* FOUND USER */
			$row = mysql_fetch_assoc($result);
			$id = $row['id'];
			$login = $row['login'];
			$query = "INSERT INTO friends (id, login, friend) VALUES ('$id', '$login', '$add')";
			$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		}
	}
	else if (mysql_num_rows($result) == 1) {	/* ADD A NEW FREIND */
		$row = mysql_fetch_assoc($result);
		$friends = $row['friend'];	/* TACK ON THE FRIEND */
		if ($friends) $friends = $friends . "," . $add;
		else $friends = $add;
		$query = "UPDATE friends set friend = '$friends' WHERE id = $from";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	}
}

function invite($id, $from, $insert, $new) {	/* INVITE A FRIEND BY MAIL */
	$authcode = rand(100000,999999);
	$mailfile='include/email.' . $_SESSION['lang']; 
	include $mailfile;

	$to = $insert;
	$subject = "how:now " . $em_friendreq . " " . $from;

	if ($new) $body=$em_new;		/* TEXT FOR NEW USERS */
	else $body=$em_old;			/* TEXT FOR CURRENT USERS */
	if ($body) $body .= $authcode;
	else $body="Error - message body is missing...";

	$headers = "From: hownow  <friends@hownow.me>\r\n";
	$headers .= "Reply-To: friends@hownow.me\r\n";
	if (mail($to, $subject, $body, $headers)) {
		$query = "INSERT into pendingfriends (fromfriend, tofriend, asked, authcode) VALUES('$id', '$insert' , NOW(), '$authcode') ";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
 	} 
}
?>
