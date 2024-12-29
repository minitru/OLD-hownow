<?php 
include 'include/db.php';

print "<CENTER><h3>$pr_dofriends</h3></CENTER><BR>";
print "<form id=\"formContact\" method=\"post\" action=\"updatefriends.php\" enctype=\"application/x-www-form-urlencoded\">";


print "
<div class=formtitle>
	<CENTER><h3>$pr_inviteinfo</H3></CENTER>
        <label id=\"formtitle\" for=\"login\">$pr_invite</label>
        <input id=\"text\" name=\"invite\" type=\"text\" value=\"\" />";
print "</div>";

if ($action == 'add') {
	print "<div class=formtitle>";
	print "</form><CENTER><FONT COLOR=\"yellow\">$myfriend invited</FONT></CENTER>";
	print "</div>";
}
print " <input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_inv\" /></p>";

print "<div class=formtitle><BR><BR>
	<CENTER><h3>$pr_remove</H3></CENTER>";

$query = "SELECT * FROM friends WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$row = mysql_fetch_assoc($result);
$friends = explode(",",$row['friend']);

/* NOW SQUISH ALL THOSE IDS INTO A NEW QUERY */
foreach ($friends AS $friend) {
        if (!$allfriends) $allfriends = "id = '" . $friend . "'";
        else $allfriends = $allfriends . " OR id = '" . $friend . "'";
}

# print $allfriends;
$query = "SELECT id, login FROM friends WHERE $allfriends ORDER BY login";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$count = 0;

/* NOW PRINT OUT THE RESULTS */
while ($row = mysql_fetch_array($result)) {
 	$fre .= "<OPTION label=\"" . $row['login'] . "\" value=\"" . $row['id'] . "\">" .  $row['login'] . "</OPTION> ";
}

print "<CENTER><SELECT NAME=\"delete\">$fre</SELECT></CENTER>";

if ($action == 'delete') {
	print "<BR><CENTER><FONT COLOR=\"yellow\">$myfriend deleted</FONT></CENTER>";
}

print "</div>
<input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_del\" /></p>
</FORM>";
?>
