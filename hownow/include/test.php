<?php
include ("db.php");
include ("../jp/src/jpgraph.php");
include ("../jp/src//jpgraph_line.php");
include ("../jp/src//jpgraph_date.php");

$id = $_GET["id"];
# $id='1007';

/* NOW SUCK THE DATA OUT AND FORMAT IT FOR A CHART */
/* $query = "SELECT * FROM emotags WHERE id = \"$id\" ORDER BY count"; */
$query = "SELECT emotags.*, UNIX_TIMESTAMP(added) as unixtime from emotags  WHERE id = \"$id\" ORDER BY count";
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

$data = array();
$xdata = array();


// print "NUM: " . mysql_num_rows($result) . "\n";

while ($row = mysql_fetch_array($result)) {
	$data[] = $row['E'];
	$xdata[] = $row['unixtime'];

	$label = $row['why'];
} 
// print_r($data);
// print_r($xdata);
// exit;
//$datay1 = array(2,6,7,12,13,18);
//$datay2 = array(5,12,12,19,25,20);

/* SMM TEST DATA
$datay1 = array(3,5,-4,3,3,4,4,-3,-4,2,-2,2,4,2,-5,4,3,5,5,2,3,4,4,4,2,0,4,5,4,0,0,0,0,0,0,0,0,3,3,3,3,3,3,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5,0,0,1,0,0,4,3,2,2,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4,4);
*/

// Create the new graph
$graph = new Graph(500,335);

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
$graph->SetMargin(40,40,60,80);
$graph->SetMarginColor('darkgray');

$graph->title->SetFont(FF_VERDANA,FS_BOLD,14);
$graph->title->SetColor('white:0.8');

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin',0,10);
$graph->title->Set($label);

// Set the angle for the labels to 90 degrees
$graph->xaxis->SetColor('white:0.8');
$graph->xaxis->SetPos ("min");
$graph->yaxis->scale->SetGrace(10, 10);
$graph->xaxis->SetLabelAngle(90);
$graph->SetBackgroundGradient('blue','navy:0.5',GRAD_HOR,BGRAD_PLOT);

// Enable X and Y Grid
$graph->xgrid->Show();
$graph->xgrid->SetColor('gray@0.5');
$graph->ygrid->SetColor('gray@0.5');

$line = new LinePlot($data,$xdata);
//$line->SetLegend('your emotags');
// $line->SetFillColor('lightblue@0.5');
$line->SetColor("yellow");
$line->SetWeight(2);
$line->mark->SetType(MARK_IMG_DIAMOND,3,0.3);
$graph->Add($line);
$graph->Stroke();
?>
