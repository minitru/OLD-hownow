<HTML>
<HEAD>
<title>how:now</title>
<link rel="stylesheet" type="text/css" href="bc.css">

<script type="text/javascript">
var t1;
var x1;

function showall(){
	if (t1) {
		t1 = 0;
		allemo.style.visibility="visible"
		physical.style.visibility="visible"
		uppersubmit.style.visibility="hidden"
	}
	else {
		t1 = 1;
		allemo.style.visibility="hidden"
		physical.style.visibility="hidden"
		uppersubmit.style.visibility="visible"
	}
}

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

$opt = <<<EOF
       <OPTION label="?" value="-1"></OPTION>
       <OPTION label="10" value="10">10</OPTION>
       <OPTION label="9" value="9">9</OPTION>
       <OPTION label="8" value="8">8</OPTION>
       <OPTION label="7" value="7">7</OPTION>
       <OPTION label="6" value="6">6</OPTION>
       <OPTION label="5" value="5">5</OPTION>
       <OPTION label="4" value="4">4</OPTION>
       <OPTION label="3" value="3">3</OPTION>
       <OPTION label="2" value="2">2</OPTION>
       <OPTION label="1" value="1">1</OPTION>
       <OPTION label="0" value="0">0</OPTION>
EOF;
?>

</script> 
</HEAD>

<BODY onload="showall()">

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
	include 'showgraph.php';
}
else {
	include 'signin.php';
}
?>

