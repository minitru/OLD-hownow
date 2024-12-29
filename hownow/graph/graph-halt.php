<?php

include "data.php";

$hdata = array();
$adata = array();
$ldata = array();
$tdata = array();
$htime = array();
$atime = array();
$ltime = array();
$ttime = array();

/* NOW LETS DO THE HALT GRAPHS */
/* H */

list($hdata, $htime) = getdbdata($id, 'h');
list($adata, $atime) = getdbdata($id, 'a');
list($ldata, $ltime) = getdbdata($id, 'l');
list($tdata, $ttime) = getdbdata($id, 't');

$label = $name . ":halt";
$color="purple";
$gname = "public/" .  $id . "." . "halt.png";
$bname = "public/" .  $id . "." . "big.halt.png";
$h="Hungry";
$a="Angry";
$l="Lonely";
$t="Tired";
graph3($label, $gname, $color, $h, $a, $l, $t, $htime, $hdata,  $atime, $adata, $ltime, $ldata, $ttime, $tdata);
# bar($label, $gname, $color, $h, $a, $l, $t, $htime, $hdata,  $atime, $adata, $ltime, $ldata, $ttime, $tdata);
biggraph($label, $bname, $color, $h, $a, $l, $t, $htime, $hdata,  $atime, $adata, $ltime, $ldata, $ttime, $tdata);

?>
