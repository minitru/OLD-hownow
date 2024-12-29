<?php

$opt = <<<EOF
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
EOF;

$x1_para = <<< EOF
<TR><TD ALIGN=RIGHT><?php print $x1; ?>
<INPUT TYPE="text" NAME="x1">
EOF;

$x2_para = <<<EOF
<TR><TD ALIGN=RIGHT><?php print $x2; ?>
<INPUT TYPE="text" NAME="x2">
EOF;

$x3_para = <<<EOF
<TR><TD ALIGN=RIGHT><?php print $x3; ?>
<INPUT TYPE="text" NAME="x3">
EOF;

/*
 * NOW GENERATE OUR HTML 
 */
$x1 = $row['x1_title'];
$x2 = $row['x2_title'];
$x3 = $row['x3_title'];
$x = $x1 . $x2 . $x3;
$moreprinted = 1;
if ($x) {
	print "<TR><TD><BR></TD></TR><TR><TD ALIGN=LEFT>$pr_trmore</TD>";
	$moreprinted=0;
}
else {
	print "<TR><TD><BR></TD></TR><TR><TD ALIGN=LEFT>$pr_trmore: <A HREF=settings.php><IMG BORDER=0 SRC=\"icons/plus.png\"></a> </TD>";
}
if ($x1) {
	print "<TD ALIGN=RIGHT>$x1 <INPUT TYPE=TEXT NAME=x1 SIZE=4></TD>";
}
if ($x2) {
	print "<TD ALIGN=RIGHT>$x2 <INPUT TYPE=TEXT NAME=x2 SIZE=4></TD>";
}
if ($x3) {
	print "<TD ALIGN=RIGHT>$x3 <INPUT TYPE=TEXT NAME=x3 SIZE=4></TD>";
}
print "</TR>";

$u1 = $row['u1_title'];
$u2 = $row['u2_title'];
$u3 = $row['u3_title'];
$u = $u1 . $u2 . $u3;
if ($u) {
	print "<TR><TD><BR></TD></TR><TR><TD ALIGN=LEFT>Track others</TD>";
}
else if ($moreprinted == 0){
	print "<TR><TD><BR></TD></TR><TR><TD ALIGN=LEFT>$pr_trmore: <A HREF=settings.php><IMG BORDER=0 SRC=\"icons/plus.png\"></a> </TD>";
}
if ($u1) {
	print "<TD ALIGN=RIGHT>$u1 <SELECT name='u1'>$opt</SELECT></TD>";
}
if ($u2) {
	print "<TD ALIGN=RIGHT>$u2 <SELECT name='u2'>$opt</SELECT></TD>";
}
if ($u3) {
	print "<TD ALIGN=RIGHT>$u3 <SELECT name='u3'>$opt</SELECT></TD>";
}
print "</TR>";

?>

