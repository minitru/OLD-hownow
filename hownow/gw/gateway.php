<?php
include '../include/db.php';	/* CONNECT TO THE DB */
/*
 * UPDATE THE DATABASE
 */

if ($_POST['src']) {
	$src = $_POST['src'];
}
if ($_POST['user']) {
	$user = $_POST['user'];
}
if ($_POST['emo']) {
	$emo = $_POST['emo'];
}
if ($_POST['why']) {
	$why = $_POST['why'];
}

/*
 * OK INPUT FROM THE GATEWAY WILL HAVE A USER THAT IS EITHER AN E-MAIL
 * ADDRESS OR AN SMS PHONE NUMBER, SO CHECK BOTH
 * HECK, IT SHOULD BE ANYTHING WITH WHICH WE CAN ID THE USER, INCL THEIR ID
 */

if ($src == "email") {
	$via = "EMA";
	$query = "SELECT * FROM users WHERE email = \"$user\"";
}
if ($src == "sms") {
	$via = "SMS";
	$query = "SELECT * FROM users WHERE telno = \"$user\"";
}
if ($src == "twitter") {
	$via = "TWT";
	$query = "SELECT * FROM users WHERE twitter = \"$user\"";
}
$name = "/home/www/docs/hownow/data/EMO." . getmypid();
$fp = fopen("$name", 'w');
fprintf($fp, "QUERY: %s\n", $query);
fclose($fp);

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

if (mysql_num_rows($result) == 0) {	/* STILL NOT FOUND... DIE */
	$name = "/home/www/docs/hownow/data/EMO." . getmypid();
	$fp = fopen("$name", 'w');
	fprintf($fp, "ERROR CANT FIND %s [%s] via %s\n", $user, $emo, $via);
	fclose($fp);
	exit;
} 
else {
	$name = "/home/www/docs/hownow/data/emolog";
	$fp = fopen("$name", 'a+');
	fprintf($fp, "[%s] %s %s [%s]\n", $query, $via, $user, $emo);
	fclose($fp);
}


/* GET THE USER ID - WE'RE GONNA NEED IT */
$row = mysql_fetch_assoc($result);
$id = $row['id'];

/*
 * PROCESS THE EMODATA STRING, IT SHOULD JUST BE CHART@VALUE STUFF 
 * ONLY INSERT DATA INTO THE DB IF IT'S THERE
 * OTHERWISE IT'S NULL
 *
 * OF COURSE AT SOME POINT IT MIGHT BE NICE TO BE ABLE TO ADD TEXT
 * BUT NOT TODAY, IE E@8 I feel great
 */
if ($why) {
	$edbfields = "id, via, added, why";		/* THE emodata table */
	$edbval = "$id, \"$via\", NOW(), \"$why\"";
}
else {
	$edbfields = "id, via, added";		/* THE emodata table */
	$edbval = "$id, \"$via\", NOW()";
}

$dbfields = "id, via, added";	/* THE moredata table */
$dbval = "$id, \"$via\", NOW()";

$fp = fopen("$name", 'a+');
$words = explode(" ", $emo);
foreach ($words as $word) {
	# fprintf($fp, "WORD: %s\n", $word);
	list($chart, $level) = split("@", $word);
	# fprintf($fp, "CHART: %s LEVEL: %s\n", $chart, $level);

	
	$chart = strtolower($chart);
	
	switch($chart) {
		case "e":
			$eflag="1";
			$edbfields = $edbfields . ", E";
			$edbval = $edbval  . ", '" . $level . "'";
			break;
		case "h":
			$moreflag="1";
			$dbfields = $dbfields . ", H";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "a":
			$moreflag="1";
			$dbfields = $dbfields . ", A";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "l":
			$moreflag="1";
			$dbfields = $dbfields . ", L";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "t":
			$moreflag="1";
			$dbfields = $dbfields . ", T";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "f":
			$moreflag="1";
			$dbfields = $dbfields . ", F";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "s":
			$moreflag="1";
			$dbfields = $dbfields . ", S";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "p":
			$moreflag="1";
			$dbfields = $dbfields . ", P";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "d":
			$moreflag="1";
			$dbfields = $dbfields . ", D";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "u1":
			$moreflag="1";
			$dbfields = $dbfields . ", u1";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "u2":
			$moreflag="1";
			$dbfields = $dbfields . ", u2";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "u3":
			$moreflag="1";
			$dbfields = $dbfields . ", u3";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "x1":
			$moreflag="1";
			$dbfields = $dbfields . ", x1";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "x2":
			$moreflag="1";
			$dbfields = $dbfields . ", x2";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
		case "x3":
			$moreflag="1";
			$dbfields = $dbfields . ", x3";
			$dbval = $dbval  . ", '" . $level . "'";
			break;
	}
}


if ($eflag) {
	fprintf($fp, "EDBFIELDS: %s EDBVAL: %s\n", $edbfields, $edbval);
	$query = "INSERT INTO emotags ($edbfields) VALUES ($edbval)";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
}
if ($moreflag) {
	fprintf($fp, "DBFIELDS: %s DBVAL: %s\n", $dbfields, $dbval);
	$query = "INSERT INTO moredata ($dbfields) VALUES ($dbval)";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
}
fclose($fp);

/* NOW SUCK THE DATA OUT AND FORMAT IT FOR A CHART */
/* MAY WANT TO REGENERATE CHARTS HERE */

$query = "SELECT * FROM emotags WHERE id = \"$id\" ORDER BY count";
//print "QUERY: " . $query;
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

/* include 'showgraph.php'; */
?>
