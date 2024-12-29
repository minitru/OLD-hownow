<?php 

print "<CENTER><h3>$pr_goals</h3></CENTER><BR>";
print "<form id=\"formContact\" method=\"post\" action=\"updatesettings.php\" enctype=\"application/x-www-form-urlencoded\">";
print "<INPUT name=\"id\" type=\"hidden\" value=\"$id\">";

print "<div class=formtitle>
	 <CENTER><h3>$pr_stop</H3></CENTER>

       <label id=\"formtitle\" for=\"login\">$pr_istopped</label>";

array($birth);
$birth=split('-', $row['bday']);
//print $birth[0] . $birth[1] . $birth[2];
selectdate($birth[2],$birth[1],$birth[0],'bday','bmon','byr');
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

print " <input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_inv\" /></p>
</FORM>";
?>
