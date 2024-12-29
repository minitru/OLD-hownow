<?php
include 'include/db.php';

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

$efile="/public/" . $id . ".emo.png";
$hfile="/public/" . $id . ".halt.png";
$ffile="/public/" . $id . ".fspd.png";
$bfile="/public/" . $id . ".bio.png";

$eurl="input.php?section=big&id=" . $id . "&graph=emo";
$hurl="input.php?section=big&id=" . $id . "&graph=halt";
$furl="input.php?section=big&id=" . $id . "&graph=fspd";
$burl="input.php?section=big&id=" . $id . "&graph=bio";

$ephys="/home/www/docs/hownow/". $efile;
$hphys="/home/www/docs/hownow/". $hfile;
$fphys="/home/www/docs/hownow/". $ffile;
$bphys="/home/www/docs/hownow/". $bfile;

print "<div> <ul class=\"carouselContainer\"> 
	<!-- PANEL [photo0] --> 
	<li class=\"panel\"> 
	<div class=\"overview\">

<CENTER><TABLE><TR>";

if (file_exists($ephys)) print "<TD><A HREF=" . $eurl . "><IMG SRC=". $efile . "></A></TD>";
if (file_exists($hphys)) print "<TD><A HREF=" . $hurl . "><IMG SRC=". $hfile . "></A></TD>";
print "</TR></TR>";
if (file_exists($fphys)) print "<TD><A HREF=" . $furl . "><IMG SRC=". $ffile . "></A></TD>";
if (file_exists($bphys)) print "<TD><A HREF=" . $burl . "><IMG SRC=". $bfile . "></A></TD>";

print "</TR></TABLE></CENTER>";
print "</div></li>";

if (file_exists($ephys)) {
print "
	<!-- PANEL [photo1] -->
	<li class=\"panel\">
	<div class=\"overview\">
		<A HREF=\"$eurl\">
		<img src=\"../public/$id.big.emo.png\" width=\"369px\" height=\"245px\" alt=\"Photo 1\" /></A>
		<h3>$pr_emo</h3>
		$pr_emo_txt
	</div>
	<div class=\"extended\">
		<h3>$login:emograph</h3>
	</div></li>";
}

if (file_exists($hphys)) {
print "
	<!-- PANEL [photo2] -->
	<li class=\"panel\">
	<div class=\"overview\">
		<A HREF=\"$hurl\">
		<img src=\"../public/$id.big.halt.png\" width=\"369px\" height=\"245px\" alt=\"Photo 1\" /></A>
		<h3>$pr_halt</h3>
		$pr_halt_txt
	</div>
	<div class=\"extended\">
		<h3>$login:HALT graph</h3>
	</div></li>";
}

if (file_exists($bphys)) {
print "
	<!-- PANEL [photo3] -->
	<li class=\"panel\">
	<div class=\"overview\">
		<A HREF=\"$burl\">
		<img src=\"../public/$id.big.bio.png\" width=\"369px\" height=\"245px\" alt=\"Photo 1\" /></A>
		<h3>$pr_bio</h3>
		$pr_bio_txt
	</div>
	<div class=\"extended\">
		<h3>$login:biorhythms</h3>
	</div></li>";
}

if (file_exists($fphys)) {
print "
	<!-- PANEL [photo4] -->
	<li class=\"panel\">
	<div class=\"overview\">
		<A HREF=\"$furl\">
		<img src=\"../public/$id.big.fspd.png\" width=\"369px\" height=\"245px\" alt=\"Photo 1\" /></A>
		<h3>$pr_fspd</h3>
		$pr_fspd_txt
	</div>
	<div class=\"extended\">
		<h3>$login:FSPD</h3>
	</div></li>";
}



print "</div>";

?>
