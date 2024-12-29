<?php

$fdata = array();	/* FEAR */
$sdata = array();	/* SICK */
$pdata = array();	/* PAIN */
$ddata = array();	/* DRUNK */
$ftime = array();
$stime = array();
$ptime = array();
$dtime = array();

/* NOW LETS DO THE PHYSICAL GRAPHS */
/* F */
$query = "SELECT f, UNIX_TIMESTAMP(added) as unixtime from moredata  WHERE id = \"$id\" AND f IS NOT NULL ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
while ($row = mysql_fetch_array($result)) {
	$fdata[] = $row['f'];
	$ftime[] = $row['unixtime'];
}

/* S */
$query = "SELECT s, UNIX_TIMESTAMP(added) as unixtime from moredata  WHERE id = \"$id\" AND s IS NOT NULL ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
while ($row = mysql_fetch_array($result)) {
	$sdata[] = $row['s'];
	$stime[] = $row['unixtime'];
}

/* P */
$query = "SELECT p, UNIX_TIMESTAMP(added) as unixtime from moredata  WHERE id = \"$id\" AND p IS NOT NULL ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
while ($row = mysql_fetch_array($result)) {
	$pdata[] = $row['p'];
	$ptime[] = $row['unixtime'];
}

/* D */
$query = "SELECT d, UNIX_TIMESTAMP(added) as unixtime from moredata  WHERE id = \"$id\" AND d IS NOT NULL ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());
while ($row = mysql_fetch_array($result)) {
	$ddata[] = $row['d'];
	$dtime[] = $row['unixtime'];
}

$label = $name . ":phys";
$color="darkred";
$gname = "public/" .  $id . "." . "fspd.png";
$bname = "public/" .  $id . "." . "big.fspd.png";
$f="Fear";
$s="Sick";
$p="Pain";
$d="Intox";
graph3($label, $gname, $color, $f, $s, $p, $d, $ftime, $fdata,  $stime, $sdata, $ptime, $pdata, $dtime, $ddata);
biggraph($label, $bname, $color, $f, $s, $p, $d, $ftime, $fdata,  $stime, $sdata, $ptime, $pdata, $dtime, $ddata);
?>
