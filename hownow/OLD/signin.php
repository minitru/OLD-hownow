<?php include "include/checksession.php"; ?>
<HTML>
<HEAD>
<title>how:now</title>
<link rel="stylesheet" type="text/css" href="bc.css">

<form action="index.php" id="lf" method="post">
<select name="lang" onchange="this.form.submit();">
    <option value="" selected="selected">Language ...&nbsp;</option>
<option value="en">English</option>
<option value="fr">Fran&ccedil;ais</option>
  </select>
</form>



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
				<h2 class="first"><?php print $pr_welcome; ?></h2>
<BR><BR>
			<div class="entry"><P>
<BR>
<CENTER>
<?php 

if ($loginerror) {
	print $loginerror;
}
?>
<FORM action="http://hownow.me/login.php" method="post">
<TABLE><TR><TD>
<INPUT name="lang" type="hidden" value="<?php print $lang; ?>">
<?php print $pr_username; ?>:</TD><TD> <INPUT name="login" type="text" value=""></TD></TR>
<BR>
<TR><TD><?php print $pr_password; ?>:</TD><TD><INPUT name="password" type="password" value=""></TD></TR>

<TR><TD ALIGN=CENTER COLSPAN=2><INPUT type="submit" value="<?php print $pr_signin; ?>"></FORM></TD></TR></TABLE>
<BR><BR>
<BR><BR>
<H2><a href="signup.php"><?php print $pr_join; ?></A></H2>

				</div id="entry">

			</div id="post">
</FORM>
</div id="content">

<div id="sidebar">
<li><h3><?php print $pr_about; ?></h3>
			<ul>
<?php print $pr_about_txt; ?>
<P>
</H3></ul>

		<h3><?php print $pr_how; ?></h3>
<ul>
	<?php print $pr_how_txt; ?>
</ul>

		<h3><?php print $pr_why; ?></h3>
			<ul>
	<?php print $pr_why_txt; ?>
			</ul>
		</div>
	</div>
<hr />
<?php include 'footer.php'; ?>
</div>
</CENTER>
</body>
</html>
