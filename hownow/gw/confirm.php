<?php
include '/var/www/hownow/include/db.php';	/* CONNECT TO THE DB */
include '/var/www/hownow/chgfriends.php';
/*
 * CONFIRM A FRIEND
 * THIS ACCEPTS INPUT VIA EMAIL ON MAC TO THIS FORM HERE
 * ONLY INPUT IS REALLY THE CONFIRMATION NUMBER (MAYBE EMAIL ADDRESS AS WELL)
 */ 

function confirm($email, $conf) {
	/* SMM TEST
	$email="eating@twitanon.com";
	$conf="788929";
	*/
	
	$name = "/var/www/hownow/data/FRIEND." . getmypid();
	$fp = fopen("$name", 'w');
	fprintf($fp, "email: %s\n", $email);
	fprintf($fp, "conf: %s\n", $conf);
	
	$query = "SELECT * FROM pendingfriends WHERE authcode='$conf'";
	# print "QUERY AUTHCODE " . $conf . " "  . $query;
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	if (mysql_num_rows($result) != 0) { 		/* FRIEND ACCEPTED */
		$row = mysql_fetch_assoc($result);
		$fromid = $row['fromfriend'];
		$tofriend = $row['tofriend'];

		/* SMM NEED TO THINK ABOUT THIS... REALLY SHOULD JUST
		 * USE THE AUTH CODE INFO AND E-MAIL ADDRESS, NOT NECESSARILY
		 * THE RETURN ADDRESS FROM THE E-MAIL IF REPLY...
		 * ONLY MATTERS IF EMAIL IS ALIAS i.e. eating@twitanon.com
		 * WHICH SHOWS UP AS maclawran.ca, WHICH IS A DIFFERENT ACCT
		 */
		$query = "SELECT * FROM users WHERE email='$email'";
		fprintf($fp, "query: %s\n", $query);
		# print "QUERY " . $query;
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		if (mysql_num_rows($result) != 0) { 		/* THEY'RE REGISTERED */
			$row = mysql_fetch_assoc($result);
			$toid = $row['id'];
	
			# print "ADD FRIENDS " . $fromid . " " . $toid;
			fprintf($fp, "FROM ID: %s  TO ID:%d\n", $fromid, $toid);
	
			addfriend($fromid, $toid);
			addfriend($toid, $fromid);
	
			# print "DELETEPENDING AUTH " . $conf;
			/* WE CAN DELETE THE PENDING FRIEND RECORD NOW... */
			$query = "DELETE FROM pendingfriends WHERE AUTHCODE='$conf'";
			$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		}
		/* 
	 	* IF THE FRIEND IS NOT REGISTERED YET, JUST UPDATE THE PENDINGFRIENDS TABLE 
	 	* AND DEAL WITH IT IF AND WHEN THEY SIGN UP
	 	*/
		else {		/* NOT REGISTERED YET, UPDATE PENDINGFRIENDS AND WAIT FOR THEM */
			$query = "UPDATE pendingfriends SET replyfrom='$email', replied='NOW()' WHERE AUTHCODE='$conf'";
			$result = mysql_query($query) or die('Query failed: ' . mysql_error());
		}
	
	}
	fclose($fp);
}
?>
