<?php 
include 'include/db.php';
include 'include/sel.php';
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

if ($row['lang'] == "en") {
        // print $row['id'] .  "..." .  $row['lang'];
        $sel1 = " SELECTED ";
}
else $sel2 = " SELECTED ";

switch($row['u1']) {
case 1: $u1_1 = "SELECTED"; break;
case 2: $u1_2 = "SELECTED"; break;
case 3: $u1_3 = "SELECTED"; break;
}
switch($row['u2']) {
case 1: $u2_1 = "SELECTED"; break;
case 2: $u2_2 = "SELECTED"; break;
case 3: $u2_3 = "SELECTED"; break;
}
switch($row['u3']) {
case 1: $u3_1 = "SELECTED"; break;
case 2: $u3_2 = "SELECTED"; break;
case 3: $u3_3 = "SELECTED"; break;
}
switch($row['x1']) {
case 1: $x1_1 = "SELECTED"; break;
case 2: $x1_2 = "SELECTED"; break;
case 3: $x1_3 = "SELECTED"; break;
}
switch($row['x2']) {
case 1: $x2_1 = "SELECTED"; break;
case 2: $x2_2 = "SELECTED"; break;
case 3: $x2_3 = "SELECTED"; break;
}
switch($row['x3']) {
case 1: $x3_1 = "SELECTED"; break;
case 2: $x3_2 = "SELECTED"; break;
case 3: $x3_3 = "SELECTED"; break;
}
switch($row['e1']) {
case 1: $e1_1 = "SELECTED"; break;
case 2: $e1_2 = "SELECTED"; break;
case 3: $e1_3 = "SELECTED"; break;
}
switch($row['s1']) {
case 1: $s_1 = "SELECTED"; break;
case 2: $s_2 = "SELECTED"; break;
case 3: $s_3 = "SELECTED"; break;
}


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
</div>

<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_who</label>
<SELECT name=\"e1_p\">
       <OPTION label=\"$pr_public\" value=\"1\" $e1_1>$pr_public</OPTION>
       <OPTION label=\"$pr_friends>\" value=\"2\" $e1_2>$pr_friends</OPTION>
       <OPTION label=\"$pr_private>\" value=\"3\" $e1_3>$pr_private</OPTION>
</SELECT>

</div>";

print " <input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_save\" /></p>
</FORM>";
?>
