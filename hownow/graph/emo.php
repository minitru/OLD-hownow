<?php
/*
include ("jp/src/jpgraph.php");
include ("jp/src//jpgraph_line.php");
include ("jp/src//jpgraph_date.php");
*/

/*
 * GENERATE ALL GRAPHS FOR A USER WHEN THEY'VE SUMBITTED DATA
 */
function bigemograph($l, $n, $c, $xdata, $data) {

# print "LABEL: " . $l;
# print "NAME: " . $n;

// Create the new graph
$graph = new Graph(500,335);
$d=$c . ":0.5";
$graph->SetBackgroundGradient($c,$d,GRAD_HOR,BGRAD_PLOT);

/* GRAPH DEFAULTS */

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
$graph->SetMargin(0,0,0,0);		# NO MARGINS
$graph->SetMarginColor('darkgray');
/* SMM DEL 
$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
$graph->title->SetColor('white:0.5');
$graph->title->SetPos(38,32,'middle','top');		# SMM
$graph->title->Set($l);
*/

// Fix the Y-scale to go between [0,100] and use date for the x-axis
// Set the angle for the labels to 90 degrees
$graph->SetScale('datlin',0,10);

$graph->xaxis->SetColor('white:0.8');
$graph->xaxis->SetPos ("min");
# $graph->xaxis->SetLabelAngle(90);
$graph->yaxis->scale->SetGrace(10, 10);
$xx = array();	# NULL ARRAY
$graph->xaxis->SetMajTickPositions($xx,$xx);


// Enable X and Y Grid
$graph->xgrid->Show();
$graph->xgrid->SetColor('gray@0.5');
$graph->ygrid->SetColor('gray@0.5');

$line = new LinePlot($data,$xdata);
//$line->SetLegend('your emotags');
// $line->SetFillColor('lightblue@0.5');
$line->SetColor("yellow");
$line->SetWeight(2);
$line->mark->SetType(MARK_IMG_DIAMOND, 3,0.3);
$graph->Add($line);

$graph-> Stroke($n);
}
