<?php checksession(); ?>
<CENTER>
<div id="page">


<div id="header">
	<h1>how<span>:now</span></h1>
	<div class="description"><?php print $pr_emonav; ?></div>
</div id="header">

<hr />

	<div id="wrapper" class="clearfix">
		<div id="content" class="narrowcolumn">
			<!-- First Post -->
			<div class="post top" id="post-9">
				<div class="first"><H1><?php print $pr_howareyou; ?></H1>
<H2>
				<div class="entry">
<BR>
<FORM action="http://hownow.me/update.php" method="post">
 <P><?php print $pr_greatcrap; ?>
 <SELECT name="happy">
       <OPTION label="10" value="10">10</OPTION>
       <OPTION label="9" value="9">9</OPTION>
       <OPTION label="8" value="8">8</OPTION>
       <OPTION label="7" value="7">7</OPTION>
       <OPTION label="6" value="6">6</OPTION>
       <OPTION label="5" value="5" SELECTED>5</OPTION>
       <OPTION label="4" value="4">4</OPTION>
       <OPTION label="3" value="3">3</OPTION>
       <OPTION label="2" value="2">2</OPTION>
       <OPTION label="1" value="1">1</OPTION>
       <OPTION label="0" value="0">0</OPTION>
 </SELECT>
<BR><BR>
<?php print $pr_why; ?><INPUT name="why" size="33" type="text" value="">
&nbsp;
&nbsp;
&nbsp;
<a href="#" onClick="showall();return false;">
<IMG BORDER=0 SRC="icons/plus.png"></a>
<INPUT name="id" type="hidden" value="<?php echo $id; ?>">
</div>
<div id="uppersubmit">
<INPUT type="submit" name="tag" value="Submit">
</H2>

<div id="allemo">
<TABLE>

<?php 
		include "halt.php";
?>

</div>

<div id="physical">
<?php 
		include "fear.php";

		include "extra.php";
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
<BR><BR>
<BR><BR>

				</div id="entry">

			</div id="post">
<CENTER>
<BR>
</FORM>
</H1>
</CENTER>
<P>
		</div id="content">
	<div id="sidebar">

<?php
if ($name) {
  print "<li><h3>";
  print "$pr_welcome $name $id </h3>";
  print "<FORM action=\"http://hownow.me/login.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_logout\"></FORM>";
  print "<FORM action=\"settings.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_settings\"></FORM>";
  print "<FORM action=\"graphs.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_graphs\"></FORM>";
  print "<FORM action=\"twitanon.php\" method=\"post\">";
  print "<INPUT type=\"submit\" value=\"$pr_twitanon\"></FORM>";
  print "<FORM action=\"twitanon.php\" method=\"post\">";
}
?>

<li><h3><?php print $pr_measure; ?></h3>
			<ul>
<?php print $pr_measuretxt; ?>
<P>
</H3></ul>

		<h3><?php print $pr_measuremore; ?></h3>
<ul>
	<?php print $pr_mmtxt; ?>
</ul>

		<h3><?php print $pr_often; ?></h3>
			<ul>
	<?php print $pr_oftentxt; ?>
			</ul>
		</div>
	</div>
<hr />
<div id="footer">
<CENTER><P>
<?php print $pr_brought; ?> - 
<A HREF="mailto:sean@maclawran.ca"><?php print $pr_contact; ?></A>
	</p>
</CENTER>
</div>
</div>
</CENTER>
</body>
</html>
