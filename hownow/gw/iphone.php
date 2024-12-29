<?php
include '../include/db.php';	/* CONNECT TO THE DB */
/*
 * UPDATE THE DATABASE
 */

if ($_POST['sms']) {
	$sms = $_POST['sms'];
}


# SMS: (288, u\'+14152793985\', 1220995678, u\'D@0\', 2, 0, None, 166, 0, 38, 0, 0)
$name = "/home/www/docs/hownow/data/IPHONE." . getmypid();
$fp = fopen("$name", 'w');
# fprintf($fp, "SMS: %s\n\n", $sms);
list ($num, $telno, $time, $txt, $rest) = explode(",", $sms);

# $telno u\'+14152793985\'
# MAY ALSO BE u'5149964638',
$telno=str_replace("u\\'", "", $telno);
$telno=str_replace("\'", "", $telno);
$telno=str_replace("+1", "", $telno);

$txt=str_replace("u\\'", "", $txt);
$txt=str_replace("u\\\"", "", $txt);
$txt=str_replace("\\'", "", $txt);

# THIS WORKS - IT'S THE EPOCH.... GONNA HAVE TO USE THIS SOON....
$date = date(DATE_RFC822, $time);
fprintf($fp, "SMS: %s %s %s $s\n", $telno. $time, $txt, $date);
fclose($fp);

?>
