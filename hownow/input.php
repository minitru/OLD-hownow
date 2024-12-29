<?php include "include/checksession.php";
if (! isset($_SESSION['id'])) {
        header("location: signin.php");
}

if ($_GET['action']) $action=$_GET['action'];
if ($_GET['myfriend']) $myfriend=$_GET['myfriend'];

if ($_GET['section']) $section=$_GET['section'];
else if ($start) $section=$start;

if ($section == 'about') sleep(1);	# GIVE PAGE TIME TO LOAD...

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<!-- EDIT [Page title] -->
		<title>how:now</title>
		<!-- END EDIT -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="content-script-type" content="text/javascript" />
		<!-- EDIT [Meta tag] -->
		<meta http-equiv="reply-to" content="" />
		<!-- END EDIT -->
		<!-- EDIT [Include sitename in copyright] -->
		<meta name="copyright" content="Copyright 2008" />
		<!-- END EDIT -->
		<meta name="robots" content="index, follow, noimageclick, noimageindex" />
		<!-- EDIT [Meta tag] -->
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!-- END EDIT -->
		<style type="text/css" media="screen">@import url("./assets/css/reset.css");</style>
		<style type="text/css" media="screen">@import url("./assets/css/screen.css");</style>
		<style type="text/css" media="print">@import url("./assets/css/print.css");</style>
		<!--[if IE 6]>
			<style type="text/css" media="screen">@import url("./assets/css/screen-ie6.css");</style>
		<![endif]-->
		<script type="text/javascript" src="./assets/javascript/jquery-1.2.6.min.js"></script>
		<script type="text/javascript" src="./assets/javascript/jcarousellite-1.0.1.min.js"></script>
		<script type="text/javascript" src="./assets/javascript/simplicity.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				// This is the id of the section that you want to show first
				// SMM THIS SHOULD RESPECT THE URL IT'S GIVEN
				<?php if($section) print "start('$section');";
					else print "start('sean')"; ?>
				// start('sean');
			});
		</script>
	</head>
	<body>
		<div id="container">
			<div id="innerContainer">
				<a accesskey="t" name="top"></a>
				<p class="hidden skip"><a href="#cn">Skip to content</a></p>
				<div id="header">
					<!-- EDIT [Site root URL, Sitename, Tag line] -->
					<h1><a href="#"><span>how:</span>now</a></h1>
					<h2><?php print $pr_emonav; ?></h2>
					<!-- END EDIT -->

					<!-- NOTE [See readme file for adding new pages and naming conventions] -->
					<ul id="navigation">
						<li><a id="nContact" href="#contact">Input</a></li>
						<li><a id="nSean" href="#sean">Graphs</a></li>
						<li><a id="nFriends" href="#friends">Friends</a></li>
						<li><a id="nPortfolio" href="#portfolio">Settings</a></li>
						<li><a id="nContact2" href="#contact2">Logout</a></li>
					</ul>
				</div>
				<div id="content">
					<!-- SECTION [contact] -->
					<a name="contact"></a>
					<div id="contact" class="section">
					<?php include 'new/input.php'; ?>
					</div>

					<!-- SECTION [portfolio] -->
					<a name="portfolio"></a>
					<div id="portfolio" class="section">
					<?php include 'new/settings.php'; ?>
					</div>

					<!-- SECTION [sean] -->
					<a name="sean"></a>
					<div id="sean" class="section">
					<?php include 'new/showgraph.php'; ?>
					</div>

					<!-- SECTION [about] -->
					<a name="about"></a>
					<div id="about" class="section">
					<?php include 'new/settings.php'; ?>
					</div>

					<!-- SECTION [friends] -->
					<a name="friends"></a>
					<div id="friends" class="section">
					<?php include 'new/friends.php'; ?>
					</div>
					
					<!-- SECTION [contact2] -->
					<a name="contact2"></a>
					<div id="contact2" class="section">
					<?php include 'new/logout.php'; ?>
					</div>
					
					<!-- SECTION [big] -->
					<a name="big"></a>
					<div id="big" class="section">
					<?php include 'new/newbig.php'; ?>
					</div>
				</div>
				<div id="footer">
					<!-- EDIT [Sitename] -->
					<p>Copyright (c) 2008 how:now. All rights reserved.</p>
					<!-- END EDIT -->
				</div>
			</div>
		</div>
	</body>
</html>
