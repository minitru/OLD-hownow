<?php include 'include/checksession.php'; ?>
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
                                <h2 class="first"><?php print $pr_about; ?></h2>
                                <div class="entry"><P>

				</div id="entry">

			</div id="post">
<BR>
		</div id="content">
	<div id="sidebar">

<?php include "include/sidebuttons.php"?>

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
