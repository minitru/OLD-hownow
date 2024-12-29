<?php
include "/home/www/docs/hownow/include/db.php";

function getdbdata($id, $field) {
	$data=array();
	$time=array();
	# print "CALLING DB " . $id . $field . "\n";
	$query = "SELECT $field, UNIX_TIMESTAMP(added) as unixtime from moredata  WHERE id = \"$id\" AND $field IS NOT NULL ORDER BY count";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	while ($row = mysql_fetch_array($result)) {
        	$data[] = $row[$field];
        	$time[] = $row['unixtime'];
	}
	return array($data, $time);
}

?>
