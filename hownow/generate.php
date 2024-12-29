<?php
include ("include/db.php");
include ("graph/graphs.php");
# include ("jp/src/jpgraph.php");
# include ("jp/src//jpgraph_line.php");
# include ("jp/src//jpgraph_date.php");

/*
 * GENERATE ALL GRAPHS FOR A USER WHEN THEY'VE SUMBITTED DATA
 */

# $id=1007;	# SMM TEST
include "graph/graph-emo.php";
include "graph/graph-halt.php";
include "graph/graph-fspd.php";
include "graph/graph-bio.php";
#
# GENERATE THE BIG GRAPHS
# include "graph/bio.php";
# include "graph/emo.php";
?>
