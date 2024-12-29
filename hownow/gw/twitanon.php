<HTML>
<HEAD>
<title>how:now</title>
<link rel="stylesheet" type="text/css" href="bc.css">

<?php 
$lang = "en";
if ($setlang) {
	$lang = $setlang;
}
else if (isset($_POST["lang"])) {
	$lang=$_POST["lang"];
	$setlang="$lang";
}
$fname = "prompts." . $lang;
include $fname;
?>

</script> 
</HEAD>

<BODY>

<?php
if ($newuser) {		/* WE'RE COMING FROM A PHP FORM */
	$name=$newuser;
	$id=$newid;
}
else if (isset($_COOKIE["user"])) {
	if ($_COOKIE["user"]) {
		$name=$_COOKIE["user"];
		if (isset($_COOKIE["id"])) {
			$id = $_COOKIE["id"];
		}
		else $id=999;
	}
}

/*
print $user . " " . $id;
*/


if ($name) {
	include "showgraph.php";
}
else {
	include 'signin.php';
}
?>

