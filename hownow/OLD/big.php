<?php
include 'include/db.php';
include 'include/checksession.php';

$graph = $_GET["graph"];	/* 
$view = $_GET["user"];		/* TO SEE A DIFFERENT USER */
$id = $_GET["id"];		/* TO SEE A DIFFERENT USER */
# print "USER " . $login . "<BR<>";

if($view) {
        $query = "SELECT * from users WHERE login = \"$view\"";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        $row = mysql_fetch_assoc($result);
        $id = $row['id'];
        $bday = $row['bday'];

	print "USING ID: " . $id;
}
else if($id) {
        $query = "SELECT bday, login from users WHERE id = \"$id\"";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
        $row = mysql_fetch_assoc($result);
        $bday = $row['bday'];
	$view = $row['login'];
}
else {
        print "NO ID!";
}

# 
if ($graph == "emo") {
        $query = "SELECT * from emotags WHERE id = \"$id\" AND why IS NOT NULL ORDER BY added DESC";
        $result = mysql_query($query) or die('Query failed: ' . mysql_error());
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
                                <h2 class="first"><?php print $view . ":" . $graph ; ?></h2>
                                <div class="entry"><P>

				</div id="entry">

			</div id="post">
<?php 
$file = "public/" . $id . ".big." . $graph . ".png";
if (file_exists( $file  )) {
	print "<img src=\"$file\">";
}
print "<BR><BR><CENTER><TABLE>";

	if ($graph == "emo") {		/* PRINT OUT COMMENTS */
		while ($row = mysql_fetch_array($result)) {
			$count++;

			$val = $row['E'];
        		if ($val <=2 ) $color="red";
        		else if ($val <= 4) $color="yellow";
        		else if ($val >= 8) $color="lightgreen";
        		else $color="white";
			if ($count % 2 == 0) $bgcolor="#333344";
			else $bgcolor="#444444";

        		print "<TR BGCOLOR=$bgcolor><TD ALIGN=MIDDLE><FONT SIZE=-2 COLOR=";
			print $color . ">";
			print $row['added'];
			print "</TD><TD><FONT SIZE=-2 COLOR=" . $color . ">";
			print $row['E'];
			print "</TD><TD><FONT SIZE=-2>";
			print $row['why'];
			print  "</TD></TR>";
		}
	}

print "</TABLE>";
?><BR>
		</div id="content">
	<div id="sidebar">

<?php include "include/sidebuttons.php"?>
<?php include "friends.php"?>
		</div>
	</div>
<hr />
<?php include 'footer.php'; ?>
</div>
</CENTER>
</body>
</html>
