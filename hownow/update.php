<?php
include 'include/db.php';	/* CONNECT TO THE DB */
include "include/checksession.php";
if (! isset($_SESSION['id'])) {
	header("location: signin.php");
}	

/*
 * OK - UPDATE THE DATABASE, DO A QUERY AND GENERATE THE CHART FILE
 * NEED TO BE LOGGED IN FOR THIS TO WORK
 * TROUBLE WITH USING COOKIES FOR ID WHEN GOING BACK TO MAIN PAGE.
 * DON'T KNOW WHY
 */

$query = "SELECT * FROM users WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

/* NOW INSERT THE EMODATA INTO THE DB */
$row = mysql_fetch_assoc($result);
$id = $row['id'];
$login = $row['login'];
$bday = $row['bday'];

/*
 * ONLY INSERT DATA INTO THE DB IF IT'S THERE
 * OTHERWISE IT'S NULL
 */

if ($_POST[happy] != -1) {
	$dbfields = "id, E, added";
	$dbval = "$id, '$_POST[happy]', NOW()";

	if ($_POST['why']) {
		$dbfields = $dbfields . ", why";
		$dbval = $dbval . ", '" . $_POST[why] . "'";
	}
	
	if ($_POST['tag']) {
		$dbfields = $dbfields . ", tag";
		$dbval = $dbval . ", '" . $_POST[tag] . "'";
	}
	$query = "INSERT INTO emotags ($dbfields) VALUES ($dbval)";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	/* UPDATE THE FRIENDS TABLE */
	$query = "SELECT * from friends where id = $id";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	if (mysql_num_rows($result) == 0) {	/* NEW FRIENDS ENTRY */
                $query = "INSERT INTO friends (id, login, last, prev, now)
                	VALUES ('$id', '$login', '$_POST[happy]', 0, NOW())";
	}
	else {	
		$row = mysql_fetch_assoc($result);
		$prev = $row['last'];
		if (!$prev) $prev = 0;
		$query = "UPDATE friends set last = '$_POST[happy]', 
			prev = '$prev', now = NOW() WHERE id = $id";
	}
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
}

/*
 * THE REST LIVES IN moredata
 */
unset($dbfields);
unset($dbval);

if ($_POST['H']) {
	if ($_POST['H'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", H";
		else $dbfields = "H";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[H] . "'";
		else $dbval = "'" . $_POST[H] . "'";
	}
	
}
if ($_POST['A']) {
	if ($_POST['A'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", A";
		else $dbfields = "A";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[A] . "'";
		else $dbval = "'" . $_POST[A] . "'";
	}
}

if ($_POST['L']) {
	if ($_POST['L'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", L";
		else $dbfields = "L";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[L] . "'";
		else $dbval = "'" . $_POST[L] . "'";
	}
}

if ($_POST['T']) {
	if ($_POST['T'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", T";
		else $dbfields = "T";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[T] . "'";
		else $dbval = "'" . $_POST[T] . "'";
	}
}

if ($_POST['F']) {
	if ($_POST['F'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", F";
		else $dbfields = "F";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[F] . "'";
		else $dbval = "'" . $_POST[F] . "'";
	}
}

if ($_POST['S']) {
	if ($_POST['S'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", S";
		else $dbfields = "S";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[S] . "'";
		else $dbval = "'" . $_POST[S] . "'";
	}
}

if ($_POST['P']) {
	if ($_POST['P'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", P";
		else $dbfields = "P";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[P] . "'";
		else $dbval = "'" . $_POST[P] . "'";
	}
}

if ($_POST['D']) {
	if ($_POST['D'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", D";
		else $dbfields = "D";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[D] . "'";
		else $dbval = "'" . $_POST[D] . "'";
	}
}

if ($_POST['u1']) {
	if ($_POST['u1'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", u1";
		else $dbfields = "u1";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[u1] . "'";
		else $dbval = "'" . $_POST[u1] . "'";
	}
}

if ($_POST['u2']) {
	if ($_POST['u2'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", u2";
		else $dbfields = "u2";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[u2] . "'";
		else $dbval = "'" . $_POST[u2] . "'";
	}
}

if ($_POST['u3']) {
	if ($_POST['u3'] != -1) {
		if ($dbfields) $dbfields = $dbfields . ", u3";
		else $dbfields = "u3";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[u3] . "'";
		else $dbval = "'" . $_POST[u3] . "'";
	}
}

if ($_POST['x1']) {
		if ($dbfields) $dbfields = $dbfields . ", x1";
		else $dbfields = "x1";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[x1] . "'";
		else $dbval = "'" . $_POST[x1] . "'";
}

if ($_POST['x2']) {
		if ($dbfields) $dbfields = $dbfields . ", x2";
		else $dbfields = "x2";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[x2] . "'";
		else $dbval = "'" . $_POST[x2] . "'";
}

if ($_POST['x3']) {
		if ($dbfields) $dbfields = $dbfields . ", x3";
		else $dbfields = "x3";
		if ($dbval) $dbval = $dbval  . ", '" . $_POST[x3] . "'";
		else $dbval = "'" . $_POST[x3] . "'";
}

# print "DBF:" .  $dbfields . "DBV" . $dbval . "\n";

if ($dbfields) {
	$dbfields = "id, added, " . $dbfields;
	$dbval = "$id, NOW()," . $dbval;
	//print "DBF:" .  $dbfields . "DBV" . $dbval . "\n";
	//print "DB INSERT INTO MOREDATA";
	$query = "INSERT INTO moredata ($dbfields) VALUES ($dbval)";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
}

/*
 * OLD WAY - INSERT EVERYTHING NO MATTER WHAT
$query = "INSERT INTO emotags (id, E, why, added, H, A, L, T, F, S, P, D, u1, u2, u3, x2, x3)
	VALUES ('$id', '$_POST[happy]', '$_POST[why]', NOW(), '$_POST[H]', '$_POST[A]', '$_POST[L]', '$_POST[T]', '$_POST[F]', '$_POST[S]', '$_POST[P]', '$_POST[D]', '$_POST[u1]', '$_POST[u2]', '$_POST[u3]', '$_POST[x2]', '$_POST[x3]')";
 */

/* NOW SUCK THE DATA OUT AND FORMAT IT FOR A CHART */

# $query = "SELECT * FROM emotags WHERE id = \"$id\" ORDER BY count";
# SMM REBUILDING DB DEBUGGING
$query = "SELECT * FROM emotags WHERE id = \"$id\" ";
//print "QUERY: " . $query;
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

/* NOW GENERATE ALL THE CHARTS FOR THE USER */
include "generate.php";

header("location: input.php#portfolio");
?>
