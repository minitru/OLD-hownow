<?php
include 'include/db.php';
include 'include/checksession.php';
if (! isset($_SESSION['id'])) {
        header("location: signin.php");
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
	<div class="description"> <?php print $pr_emonav; ?>
</div>
</div id="header">

<hr />

	<div id="wrapper" class="clearfix">
		<div id="content" class="narrowcolumn">
			<!-- First Post -->
                        <div class="post top" id="post-9">
                                <h2 class="first"><?php print $pr_dofriends; ?> </h2>
				<BR><BR><BR>
				<FORM action="http://hownow.me/updatefriends.php" method="post">

				<P><H2>
				<?php print $pr_inviteinfo; ?><BR><BR><BR>
				<?php print $pr_invite; ?>

				<INPUT name="invite" size="33" type="text" value=""><BR><BR>
				<INPUT type="submit" name="tag" value="Invite friend">
				<BR>
				<BR><BR><BR>
				<BR><BR><BR>
				<H2><?php print $pr_remove;?></h2><BR><BR><BR>

<?php
$query = "SELECT friend FROM friends WHERE id = \"$id\"";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$row = mysql_fetch_assoc($result);
$friends = explode(",",$row['friend']);

/* NOW SQUISH ALL THOSE IDS INTO A NEW QUERY */
foreach ($friends AS $friend) {
	if (!$allfriends) $allfriends = "id = '" . $friend . "'";
	else $allfriends = $allfriends . " OR id = '" . $friend . "'";
}

# print $allfriends;

$query = "SELECT id, login FROM friends WHERE $allfriends";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$count = 0;

print "<TABLE>";

/* NOW PRINT OUT THE RESULTS */
while ($row = mysql_fetch_array($result)) {
	$count++;

	if ($count % 2 == 0) $rowcolor="#333344";
                        else $rowcolor="#444444";

	print "<TR BGCOLOR=" . $rowcolor . "><TD ALIGN=RIGHT><INPUT TYPE=RADIO NAME=delete VALUE=" . $row['id'] .  "></TD>";
	print "<TD>" . $row['login'] . "</TD></TR>";
}
print "</TABLE>";
?>
			<BR><BR>
			<INPUT type="submit" name="tag" value="Remove friend"></FORM>
			<BR><BR>
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
