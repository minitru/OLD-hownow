<?php 

/* NOW SUCK THE DATA OUT AND FORMAT IT FOR A CHART */
$query = "SELECT E, UNIX_TIMESTAMP(added) as unixtime from emotags  WHERE id = \"$id\" ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$data = array();
$xdata = array();

// print "NUM: " . mysql_num_rows($result) . "\n";

while ($row = mysql_fetch_array($result)) {
	$data[] = $row['E'];
	$xdata[] = $row['unixtime'];
	$last = $row['E'];
} 

$label = $name . ":emo";
$gname = "public/" .  $id . "." . "emo.png";
$bname = "public/" .  $id . "." . "big.emo.png";
if ($last >= 8) $color="darkgreen";
else if ($last >= 5) $color="darkblue";
else if ($last >= 3) $color="orange";
else $color="red";
graph3($label, $gname, $color, $label, NULL, NULL, NULL, $xdata, $data, NULL, NULL, NULL, NULL, NULL, NULL);
include "emo.php";
bigemograph($label, $bname, $color, $xdata, $data);	/* BIG GRAPH */
?>
