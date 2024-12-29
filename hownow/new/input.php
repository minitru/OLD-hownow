<?php 
$opt = <<<EOD
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
EOD;
print "<div class=formtitle><center><h3><span>$name :</span> $pr_howareyou</h3></center><BR></div>";

print "<FORM action=\"http://hownow.me/update.php\" method=\"post\">";

print "
<div class=formtitle>
        <label id=\"formtitle\" for=\"happy\">$pr_greatcrap</label>
 	<SELECT name=\"happy\"> $opt </SELECT>
	<BR><BR>
</div>
<div class=formtitle>
        <label id=\"formtitle\" for=\"happy\">$pr_why</label>
	<input id=\"formtitle\" name=\"why\" type=\"text\" value=\"\" />
</div>";

print "<input id=\"buttonSend\" class=\"button\" type=\"submit\" value=\"$pr_letsgo\" /></p>
</form>";
?>
