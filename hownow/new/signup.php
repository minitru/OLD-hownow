<?php 
print "<CENTER><h3>$pr_signup</h3></CENTER><BR>";
print "<form id=\"formContact\" method=\"post\" action=\"login.php\" enctype=\"application/x-www-form-urlencoded\">";

print "
<div class=formtitle>
        <label id=\"formtitle\" for=\"login\">$pr_username</label>
        <input id=\"login\" name=\"login\" type=\"text\" value=\"\" />
</div>
<div class=formtitle>
        <label id=\"formtitle\">$pr_password</label>
        <input id=\"password\" name=\"password\" type=\"password\" value=\"\" />
<p>
</div>

<div class=formtitle id=email>
        <label id=\"formtitle\">$pr_email</label>
        <input id=\"email\" name=\"email\" type=\"email\" value=\"$email\" />
<p>
<input id=\"conf\" name=\"conf\" type=\"hidden\" value=\"$conf\">
<input id=\"lang\" name=\"lang\" type=\"hidden\" value=\"$lang\">
</div> ";

print "<BR><CENTER><FONT COLOR=\"yellow\">$loginerror</FONT></CENTER>
<input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_letsgo\" /></p>
</form>";
?>
