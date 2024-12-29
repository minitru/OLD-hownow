<?php
include 'include/db.php';	/* CONNECT TO THE DB */
# SMM TEST 
# $id='1007';

/*
 * FRIENDS ROUTINE
 * DISPLAY SIDEBAR OF FRIENDS LIKE A STOCK TICKER
 */
$id=$_SESSION['id'];
$query = "SELECT friend FROM friends WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$row = mysql_fetch_assoc($result);
$friends = explode(",",$row['friend']);

/* NOW SQUISH ALL THOSE IDS INTO A NEW QUERY */
foreach ($friends AS $friend) {
	if (!$allfriends) $allfriends = "id = '" . $friend . "'";
	else $allfriends = $allfriends . " OR id = '" . $friend . "'";
}

# print $allfriends;

$query = "SELECT id, login, last, prev FROM friends WHERE $allfriends ORDER BY now DESC";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

print "<li><h4>" .  $pr_friends  . "</h4><CENTER><TABLE>";
print "<TR><TD ALIGN=MIDDLE><FONT SIZE=-3>name</TD><TD><FONT SIZE=-3>emo</TD><TD><FONT SIZE=-3>chg</TD></TR>";
$count = 0;

/* NOW PRINT OUT THE RESULTS */
while ($row = mysql_fetch_array($result)) {
	$count++;
	$last=$row['last'];
	if ($last <=2 ) $color="red";
	else if ($last <= 4) $color="yellow";
	else if ($last >= 8) $color="lightgreen";
	else $color="white";

	$diff=$last - $row['prev'];
	if ($diff < 0) {
		$dir="red";	/* DIRECTION COLORS */
	}
	else {
		$diff = "+" . $diff;
		$dir="lightgreen";
	}
	$url="<A HREF=showgraph.php?user=" . $row['login'] . ">";

	if ($count % 2 == 0) $rowcolor="#333344";
                        else $rowcolor="#444444";

	print "<TR BGCOLOR=" . $rowcolor . "><TD ALIGN=MIDDLE>" . $url . "<FONT SIZE=-3 COLOR=" . $color . ">" . $row['login'] . "</A></TD>";
	print "<TD><FONT SIZE=-2 COLOR=" . $color . ">" . $last . "</TD>";
	print "<TD><FONT SIZE=-2 COLOR=" . $dir . ">" . $diff . "</TD></TR>";
}
print "</TABLE>";
print "<BR><FONT SIZE=-4>$pr_friendsgraphs";

?>
