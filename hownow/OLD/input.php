<?php
include "include/checksession.php";
if (! isset($_SESSION['id'])) {
        header("location: signin.php");
}
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
?>
<HTML>
<HEAD>

<HEAD>
<title>how:now</title>
<link rel="stylesheet" type="text/css" href="bc.css">

<script type="text/javascript">
var t1;
var x1;

function showall(){
        if (t1) {
                t1 = 0;
                allemo.style.visibility="visible"
                physical.style.visibility="visible"
                uppersubmit.style.visibility="hidden"
        }
        else {
                t1 = 1;
                allemo.style.visibility="hidden"
                physical.style.visibility="hidden"
                uppersubmit.style.visibility="visible"
        }
}
</script>


</HEAD>

<BODY onload="showall()">
<CENTER>
<div id="page">
<div id="header">
	<h1>how<span>:now</span></h1>
	<div class="description"> <?php print $pr_emonav; ?>
</div>
</div id="header">

<hr />

	<div id="wrapper" class="clearfix">
		<div id="content" class="narrowcolumn">
			<!-- First Post -->
                        <div class="post top" id="post-9">
                                <h2 class="first">
			<H1><?php print $name . ": " . $pr_howareyou; ?></H1>
<BR><BR>
<H2>

<FORM action="http://hownow.me/update.php" method="post">
 <P><?php print $pr_greatcrap; ?>
<BR>
 <SELECT name="happy">
        <?php print $opt; ?>
 </SELECT>
	<BR>
<?php print $pr_why; ?><INPUT name="why" size="33" type="text" value="">
&nbsp;
&nbsp;
&nbsp;
<a href="#" onClick="showall();return false;">
<IMG BORDER=0 SRC="icons/plus.png"></a>
<INPUT name="id" type="hidden" value="<?php echo $id; ?>">
</H2>
<div id="uppersubmit">
<INPUT type="submit" name="tag" value="Submit"></FORM>
</H2>

<div id="allemo">
<TABLE>

<?php
                include "include/halt.php";
?>

</div>

<div id="physical">
<?php
                include "include/fear.php";

                include "include/extra.php";
?>


<TR><TD COLSPAN=4 VALIGN=BOTTOM>
<CENTER>
<INPUT name="lang" type="hidden" value="<?php print $lang; ?>">
<BR>
Tag:
<INPUT type="image" name="tag" value="idea" src="icons/idea.png">
<INPUT type="image" name="tag" value="att" src="icons/attention.png">
<INPUT type="image" name="tag" value="bang" src="icons/bang.png">
<INPUT type="image" name="tag" value="bomb" src="icons/bomb.png">
<INPUT type="image" name="tag" value="stop" src="icons/stop.png">
<INPUT type="image" name="tag" value="heart" src="icons/heart.png">
<INPUT type="image" name="tag" value="skull" src="icons/skull.png">
<INPUT type="image" name="tag" value="sun" src="icons/sun.png">
<INPUT type="image" name="tag" value="work" src="icons/work.png">
<INPUT type="image" name="tag" value="cherries" src="icons/cherries.png"><BR>
<INPUT type="submit" value="<?php print $pr_clickhere; ?>">
</TD></TR>
<TR><TD COLSPAN=2>
</TD></TR></TABLE>
</div>
</div>

			</div id="post">
		</div id="content">
	<div id="sidebar">

<?php include "include/sidebuttons.php"?>
<?php include "friends.php"?>
<BR><BR><BR><BR><BR>
<BR><BR><BR><BR><BR>
<P>
</H3></ul>
		</div>
	</div>
<hr />
<?php include 'footer.php'; ?>
</div>
</CENTER>
</body>
</html>
