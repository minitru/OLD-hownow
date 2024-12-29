<?php
include 'include/db.php';
include 'include/checksession.php';

unset($notme);
if($view != $name) $notme="TRUE";

# $name should have the user's name if they're logged in.
if ($_GET["user"]) $view = $_GET["user"];	/* TO SEE A DIFFERENT USER */
else $view=$name;

# print "USER " . $login . "<BR<>";


if($view) {
        $query = "SELECT * from users WHERE login = \"$view\"";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        $row = mysql_fetch_assoc($result);
        $id = $row['id'];
        $bday = $row['bday'];

	# print "USING ID: " . $id;
}
else if($id) {
        $query = "SELECT bday from users WHERE id = \"$id\"";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        $row = mysql_fetch_assoc($result);
        $bday = $row['bday'];
}
else {
        print "NO ID!";
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
                                <h2 class="first">
      				<?php
                		if ($notme) print $view . ":" . $pr_output;
                		else print $pr_output; ?> </h2>

			</div id="post">
<?php
$efile="/public/" . $id . ".emo.png";
$hfile="/public/" . $id . ".halt.png";
$ffile="/public/" . $id . ".fspd.png";
$bfile="/public/" . $id . ".bio.png";

$eurl="big.php?id=" . $id . "&graph=emo";
$hurl="big.php?id=" . $id . "&graph=halt";
$furl="big.php?id=" . $id . "&graph=fspd";
$burl="big.php?id=" . $id . "&graph=bio";

$ephys="/home/www/docs/hownow/". $efile;
$hphys="/home/www/docs/hownow/". $hfile;
$fphys="/home/www/docs/hownow/". $ffile;
$bphys="/home/www/docs/hownow/". $bfile;

print "<TABLE><TR>";

if (file_exists($ephys)) print "<TD><A HREF=" . $eurl . "><IMG SRC=". $efile . "></A></TD>";
if (file_exists($hphys)) print "<TD><A HREF=" . $hurl . "><IMG SRC=". $hfile . "></A></TD>";
print "</TR></TR>";
if (file_exists($fphys)) print "<TD><A HREF=" . $furl . "><IMG SRC=". $ffile . "></A></TD>";
if (file_exists($bphys)) print "<TD><A HREF=" . $burl . "><IMG SRC=". $bfile . "></A></TD>";

print "</TR></TABLE>";

?>
<BR>
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
