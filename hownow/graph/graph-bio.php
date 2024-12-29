<?php
include "include/db.php";
include_once "jp/src/jpgraph.php";
include_once "jp/src//jpgraph_line.php";
include_once "jp/src//jpgraph_date.php";
include_once "include/datediff.php";

$timestamp =  strtotime("now");
$today=date('Y-m-d', $timestamp);
# $bday = $_GET["bday"];
$gname = "public/" .  $id . "." . "bio.png";
$bname = "public/" .  $id . "." . "big.bio.png";

/* BIORHYTHM GRAPH 
 * FROM 1 WEEK BEFORE TODAY TO ONE WEEK AFTER TODAY
 * WITH DATA POINTS EVERY DAY - IS THAT ENOUGH?
 * EVERYTHING IS BASED ON NUMBER OF DAYS ALIVE...
 *
 * NOTE THAT THIS GRAPH HAS DIFFERENT AXES (-1 +1) THAN OTHERS
 */
$diff = datediff($bday, $today);
# print "ID: $id      DAYS: $bday $today $diff\n";
/* NOW START OUR GRAPH 14 DAYS EARLIER AND GO 14 DAYS LATER */
$start = $timestamp - (14 * 24 * 3600);
$stop = $timestamp + (14 * 24 * 3600);
$t = $diff - 14;	/* MY AGE, 14 DAYS AGO... */
$pi = 3.14159265;

$pdata = array();
$edata = array();
$idata = array();
$xdata = array();

$time = $start;
while ($time <= $stop) {
	$pdata[] = sin(2 * $pi * $t / 23); 	/* PHYSICAL */
	$edata[] = sin(2 * $pi * $t / 28); 	/* EMOTIONAL */
	$idata[] = sin(2 * $pi * $t / 33); 	/* INTELLECTUAL */
	$xdata[] = $time;
	$label = $name . ":bio";
	$time += (24 * 3600);	/* NEXT DAY */
	$t++;			/* NEXT DAY IN AGE AS WELL */
} 
// print_r($pdata);
// print_r($xdata);
// exit;

// Create the new graph
# $graph = new Graph(500,335);
$graph = new Graph(250,165);

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
// $graph->SetMargin(40,40,60,80);
$graph->SetMarginColor('darkgray');

$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
$graph->title->SetColor('white:0.8');

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin',-1,1);
$graph->title->Set($label);

// Set the angle for the labels to 90 degrees
$graph->yaxis->scale->SetGrace(10, 10);
$graph->xaxis->SetLabelAngle(90);
//$graph->xaxis->SetPos ("min");
$graph->xaxis->SetLabelMargin(90); 
$graph->xaxis->SetColor('white:0.8');
$graph->SetBackgroundGradient('darkgreen','navy:0.5',GRAD_HOR,BGRAD_PLOT);

// Enable X and Y Grid
$graph->xgrid->Show();
$graph->xgrid->SetColor('gray@0.5');
$graph->ygrid->SetColor('gray@0.5');

$line = new LinePlot($pdata,$xdata);
# $line->SetLegend('Physical');
// $line->SetFillColor('lightblue@0.5');
$line->SetColor("red");
$line->SetWeight(2);
// $line->mark->SetType(MARK_IMG_DIAMOND,3,0.3);
$graph->Add($line);

$line = new LinePlot($edata,$xdata);
# $line->SetLegend('Emotional');
// $line->SetFillColor('lightblue@0.5');
$line->SetColor("yellow");
$line->SetWeight(2);
// $line->mark->SetType(MARK_IMG_DIAMOND,3,0.3);
$graph->Add($line);

$line = new LinePlot($idata,$xdata);
# $line->SetLegend('Intellectual');
// $line->SetFillColor('lightblue@0.5');
$line->SetColor("blue");
$line->SetWeight(2);
// $line->mark->SetType(MARK_IMG_DIAMOND,3,0.3);
$graph->Add($line);
$graph->legend->Pos( 0.0,0.09,"right" ,"center");
$graph->Stroke($gname);
include "bio.php"
?>
