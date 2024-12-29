<?php
include ("jp/src/jpgraph.php");
include ("jp/src//jpgraph_line.php");
include ("jp/src//jpgraph_bar.php");
include ("jp/src//jpgraph_date.php");

function graph3($l, $n, $c, $l1, $l2, $l3, $l4, $t1,$d1,$t2,$d2,$t3,$d3,$t4,$d4) {

# print "LABEL: " . $l;
# print "NAME: " . $n;
# print "COLOR: " . $c;

// Create the new graph
$graph = new Graph(250,165);

// Put a horizontal legend box at the bottom of the graph
# $graph->legend->SetLayout(LEGEND_HOR); 
# $graph->legend->SetPos(0.5,0.0.5,"right","top");

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
# $graph->SetMargin(40,40,60,80);
$graph->SetMarginColor('darkgray');

$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
$graph->title->SetColor('white:0.8');

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin',0,10);
$graph->title->Set($l);

// Set the angle for the labels to 90 degrees
$graph->yaxis->scale->SetGrace(10, 10);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetPos ("min");
$graph->xaxis->SetLabelMargin(90); 
$graph->xaxis->SetColor('white:0.8');
# $d=$c . ":0.5";
$graph->SetBackgroundGradient($c,'navy:0.5',GRAD_HOR,BGRAD_PLOT);

// Enable X and Y Grid
$graph->xgrid->Show();
$graph->xgrid->SetColor('gray@0.5');
$graph->ygrid->SetColor('gray@0.5');

if (!empty($d1)) {
	$draw=1;
	$line = new LinePlot($d1,$t1);
	# $line->SetLegend($l1);
	// $line->SetFillColor('lightblue@0.5');
	$line->SetColor("green");
	$line->SetWeight(2);
	# $line->mark->SetColor('orange'); 
	# $line->mark->SetType(MARK_DIAMOND);
	$graph->Add($line);
}

if (!empty($d2)) {
	$draw=1;
	$line = new LinePlot($d2,$t2);
	# $line->SetLegend($l2);
	// $line->SetFillColor('lightblue@0.5');
	$line->SetColor("red");
	$line->SetWeight(2);
	# $line->mark->SetColor('red'); 
	# $line->mark->SetType(MARK_CIRCLE);
	$graph->Add($line);
}

if (!empty($d3)) {
	$draw=1;
	$line = new LinePlot($d3,$t3);
	# $line->SetLegend($l3);
	// $line->SetFillColor('lightblue@0.5');
	# $line->mark->SetColor('red'); 
	$line->SetColor("orange");
	$line->SetWeight(2);
	# $line->mark->SetType(MARK_CROSS);
	$graph->Add($line);
}

if (!empty($d4)) {
	$draw=1;
	$line = new LinePlot($d4,$t4);
	# $line->SetLegend($l4);
	// $line->SetFillColor('lightblue@0.5');
	# $line->mark->SetColor('blue'); 
	$line->SetColor("lightblue");
	$line->SetWeight(2);
	# $line->mark->SetType(MARK_X,3,0.3);
	$graph->Add($line);
}

	if($draw==1) {
		$graph->legend->Pos( 0.0,0.09,"right" ,"center");
		$graph->Stroke($n);
	}
}


function biggraph($l, $n, $c, $l1, $l2, $l3, $l4, $t1,$d1,$t2,$d2,$t3,$d3,$t4,$d4) {

# print "LABEL: " . $l;
# print "NAME: " . $n;
# print "COLOR: " . $c;

// Create the new graph
$graph = new Graph(500,335);

// Put a horizontal legend box at the bottom of the graph
$graph->legend->SetLayout(LEGEND_HOR); 
#$graph->legend->SetPos(0.5,0.0.5,"right","top");

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
# $graph->SetMargin(40,40,60,80);
$graph->SetMarginColor('darkgray');

$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
$graph->title->SetColor('white:0.8');

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin',0,10);
$graph->title->Set($l);

// Set the angle for the labels to 90 degrees
$graph->yaxis->scale->SetGrace(10, 10);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetPos ("min");
$graph->xaxis->SetLabelMargin(90); 
$graph->xaxis->SetColor('white:0.8');
# $d=$c . ":0.5";
$graph->SetBackgroundGradient($c,'navy:0.5',GRAD_HOR,BGRAD_PLOT);

// Enable X and Y Grid
$graph->xgrid->Show();
$graph->xgrid->SetColor('gray@0.5');
$graph->ygrid->SetColor('gray@0.5');

if (!empty($d1)) {
	$draw=1;
	$line = new LinePlot($d1,$t1);
	$line->SetLegend($l1);
	// $line->SetFillColor('lightblue@0.5');
	$line->SetColor("green");
	$line->SetWeight(2);
	# $line->mark->SetColor('orange'); 
	# $line->mark->SetType(MARK_DIAMOND);
	$graph->Add($line);
}

if (!empty($d2)) {
	$draw=1;
	$line = new LinePlot($d2,$t2);
	$line->SetLegend($l2);
	// $line->SetFillColor('lightblue@0.5');
	$line->SetColor("red");
	$line->SetWeight(2);
	# $line->mark->SetColor('red'); 
	# $line->mark->SetType(MARK_CIRCLE);
	$graph->Add($line);
}

if (!empty($d3)) {
	$draw=1;
	$line = new LinePlot($d3,$t3);
	$line->SetLegend($l3);
	// $line->SetFillColor('lightblue@0.5');
	# $line->mark->SetColor('red'); 
	$line->SetColor("orange");
	$line->SetWeight(2);
	# $line->mark->SetType(MARK_CROSS);
	$graph->Add($line);
}

if (!empty($d4)) {
	$draw=1;
	$line = new LinePlot($d4,$t4);
	$line->SetLegend($l4);
	// $line->SetFillColor('lightblue@0.5');
	# $line->mark->SetColor('blue'); 
	$line->SetColor("lightblue");
	$line->SetWeight(2);
	# $line->mark->SetType(MARK_X,3,0.3);
	$graph->Add($line);
}

	if($draw==1) {
		$graph->legend->Pos( 0.0,0.09,"middle" ,"center");
		$graph->Stroke($n);
	}
}

include 'bar.php';
?>
