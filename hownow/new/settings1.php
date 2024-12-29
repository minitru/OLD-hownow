<?php 
include 'include/db.php';
include_once 'include/sel.php';

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

if ($row['lang'] == "fr") {
        // print $row['id'] .  "..." .  $row['lang'];
        $sel2 = " SELECTED ";
}
else $sel1 = " SELECTED ";

print "<CENTER><h3>$pr_personal</h3></CENTER><BR>";
print "<form id=\"formContact\" method=\"post\" action=\"updatesettings.php\" enctype=\"application/x-www-form-urlencoded\">";
print "<INPUT name=\"id\" type=\"hidden\" value=\"$id\">";

print "
<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_chooselang</label>
	<select name=\"lang\">
<option value=\"en\"  $sel1>English</option>
<option value=\"fr\"  $sel2>Fran&ccedil;ais</option>
</select>
</div>

<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_bday</label>";

array($birth);
$birth=split('-', $row['bday']);
//print $birth[0] . $birth[1] . $birth[2];
selectdate($birth[2],$birth[1],$birth[0],'bday','bmon','byr');

$city=$row['city'];
$telno=$row['telno'];
$twitter=$row['twitter'];

print " </div>

<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_env</label>
        <input id=\"text\" name=\"city\" type=\"text\" value=\"$city\" />
</div>

<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_tel</label>
        <input id=\"text\" name=\"telno\" type=\"text\" value=\"$telno\" />
</div>

<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_twit</label>
        <input id=\"text\" name=\"twitter\" type=\"text\" value=\"$twitter\" />
</div>";

print " <input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_letsgo\" /></p>
</FORM>";
?>
