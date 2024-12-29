<?php
include 'include/db.php';	/* CONNECT TO THE DB */
include 'include/sel.php';
include "include/checksession.php";
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

?>

<HTML>
<HEAD>
<title>how:now</title>
<link rel="stylesheet" type="text/css" href="bc.css">
</HEAD>
<body>
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
				<div class="first"><H1><?php print $pr_personal; ?></H1>
<H2>
				<div class="entry"><P>
<FORM action="http://hownow.me/updatesettings.php" method="post">
<INPUT name="id" type="hidden" value="<?php echo $id; ?>">
<TABLE><TR>
<TD><CENTER><?php print $pr_chooselang; ?>:</CENTER></TD>
<TD><select name="lang">
<option value="en" <?php print $sel1; ?>>English</option>
<option value="fr" <?php print $sel2; ?>>Fran&ccedil;ais</option>
</select>
</TD></TR>

<TR><TD ><CENTER><?php print $pr_bday;?>:</TD><TD>
<?php
// NEED TO BREAK APART THE BIRTHDATE IF ITS THERE (LATER)
array($birth);
$birth=split('-', $row['bday']);
//print $birth[0] . $birth[1] . $birth[2];
selectdate($birth[2],$birth[1],$birth[0],'bday','bmon','byr'); ?>
</TD></TR>

<TR><TD ><CENTER><?php print $pr_env;?>:</CENTER></TD><TD>
<input type="text" name="city" value="<?php print $row['city']; ?>">
</TD></TR>

<TR><TD ><CENTER><?php print $pr_tel;?>:</CENTER></TD><TD>
<input type="text" name="telno" value="<?php print $row['telno']; ?>">
</TD></TR>

<TR><TD ><CENTER><?php print $pr_twit;?>:</CENTER></TD><TD>
<input type="text" name="twitter" value="<?php print $row['twitter']; ?>">
</TD></TR>

<TR><TD>
<CENTER><?php print $pr_who; ?></TD><TD>
<SELECT name="e1_p">
       <OPTION label="<?php print $pr_public;?>" value="1" <?php print $e1_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"  <?php print $e1_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3" <?php print $e1_3;?>><?php print $pr_private;?></OPTION>
</SELECT>
</CENTER></TD></TR><TR><TD><BR><BR></TD></TR>

<TR><TD COLSPAN=2 ><CENTER><H2><?php print $pr_stop;?></H2><BR>
<TR><TD COLSPAN=2 ALIGN=CENTER><?php print $pr_istopped;?>:
<input type="text" size=20 name="s1_title" value="<?php print $row['s1_title']; ?>">
<?php print $pr_stopdate;?></CENTER>
<?php
// NEED TO BREAK APART THE BIRTHDATE IF ITS THERE (LATER)
array($birth);
$birth=split('-', $row['s1']);
selectdate($birth[2],$birth[1],$birth[0],'bday1','bmon1','byr1'); ?>
</TD></TR><TR><TD><BR><BR>

<TR><TD COLSPAN=2 ><CENTER><H2><?php print $pr_trackmore;?></H2><BR>
<?php print $pr_stuff;?></CENTER></TD></TR>
<TR><TD ><CENTER>
<?php print $pr_track;?>: <input type="text" name="x1" value="<?php print $row['x1_title']; ?>"></TD><TD>
<SELECT name="x1_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $x1_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $x2_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $x3_3;?>><?php print $pr_private;?></OPTION>
</SELECT></TD></TR><TR><TD><CENTER>
<?php print $pr_track;?>: <input type="text" name="x2" value="<?php print $row['x2_title']; ?>"></TD><TD>
<SELECT name="x2_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $x1_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $x2_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $x3_3;?>><?php print $pr_private;?></OPTION>
/</SELECT><BR></TD><TR><TR><TD><CENTER>
<?php print $pr_track;?>: <input type="text" name="x3" value="<?php print $row['x3_title']; ?>"></TD><TD>
<SELECT name="x3_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $x1_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $x2_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $x3_3;?>><?php print $pr_private;?></OPTION>
</SELECT></CENTER></TD>

<TR><TD COLSPAN=2><CENTER><H2><BR><?php print $pr_others;?></H2><BR>
<?php print $pr_which;?></H2>
</CENTER></TD></TR>
<TR><TD><CENTER>
<?php print $pr_name;?>: <input type="text" name="u1" value="<?php print $row['u1_title']; ?>"></TD><TD>
<SELECT name="u1_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $u1_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $u1_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $u1_3;?>><?php print $pr_private;?></OPTION>
</SELECT></TD></TR><TR><TD><CENTER>
<?php print $pr_name;?>: <input type="text" name="u2" value="<?php print $row['u2_title']; ?>"></TD><TD>
<SELECT name="u2_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $u2_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $u2_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $u2_3;?>><?php print $pr_private;?></OPTION>
</SELECT></TD></TR><TR><TD><CENTER>
<?php print $pr_name;?>: <input type="text" name="u3" value="<?php print $row['u3_title']; ?>"></TD><TD>
<SELECT name="u3_p">
       <OPTION label="<?php print $pr_public;?>" value="1"<?php print $u3_1;?>><?php print $pr_public;?></OPTION>
       <OPTION label="<?php print $pr_friends;?>" value="2"<?php print $u3_2;?>><?php print $pr_friends;?> </OPTION>
       <OPTION label="<?php print $pr_private;?>" value="3"<?php print $u3_3;?>><?php print $pr_private;?></OPTION>
</SELECT></TD></TR>
</CENTER></TR><TR><TD><BR></TD></TR>

	<TR><TD COLSPAN=2><CENTER><H4><INPUT type="submit" value="<?php print $pr_save;?>"></CENTER></H4>
</TD></TR>
</TABLE>
				</div id="entry">
			</div id="first">
			</div id="post">
<CENTER>
<BR>
</FORM>
</H1>
</CENTER>
<P>
		</div id="content">
	<div id="sidebar">

<?php include "include/sidebuttons.php"?>

<li><h3><?php print $pr_aboutdata; ?></h3>
			<ul>
<?php print $pr_datainfo; ?>
<P>

<li><h3><?php print $pr_abouthalt; ?></h3>
			<ul>
<?php print $pr_haltinfo; ?>
<P>
</H3></ul>

		<h3><?php print $pr_aboutphys; ?></h3>
<ul>
	<?php print $pr_phys; ?>
</ul>

		<h3><?php print $pr_aboutprivacy; ?></h3>
			<ul>
	<?php print $pr_privacy; ?>

			</ul>
		<h3><?php print $pr_aboutfun; ?></h3>
			<ul>
	<?php print $pr_fun; ?>
			</ul>


		</div>
	</div>
<hr />
<?php include 'footer.php'; ?>
</div>
</CENTER>
</body>
</html>
