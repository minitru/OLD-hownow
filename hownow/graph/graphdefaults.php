<?php

/* GRAPH DEFAULTS */

// Slightly larger than normal margins at the bottom to have room for
// the x-axis labels
# $graph->SetMargin(40,40,60,80);
$graph->SetMarginColor('darkgray');

$graph->title->SetFont(FF_VERDANA,FS_BOLD,10);
$graph->title->SetColor('white:0.8');

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin',0,10);
$graph->title->Set($label);

// Set the angle for the labels to 90 degrees
$graph->xaxis->SetColor('white:0.8');
$graph->xaxis->SetPos ("min");
$graph->yaxis->scale->SetGrace(10, 10);
$graph->xaxis->SetLabelAngle(90);

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

?>
