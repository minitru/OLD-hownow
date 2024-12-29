<?php
	$recipient = "someone@domain.com";
	$redirect = "http://www.domain.com/";
	$valid = true;
	if (!$_POST['inputContactName'] || $_POST['inputContactName'] == '') $valid = false;
	if (!$_POST['inputContactEmail'] || $_POST['inputContactEmail'] == '') $valid = false;
	if (!$_POST['inputContactSubject'] || $_POST['inputContactSubject'] == '') $valid = false;
	if (!$_POST['inputContactMessage'] || $_POST['inputContactMessage'] == '') $valid = false;
	$header = "From: ".$_POST['inputContactName']." <".$_POST['inputContactEmail'].">\r\n";
	if ($valid) {
		$success = mail($recipient, stripslashes($_POST['inputContactSubject']), stripslashes($_POST['inputContactMessage']), $header);
		if ($success) {
			header('Location: '.$redirect);
		} else {
			print('<p>Unexpected error sending mail, please try again</p>');
		}
	} else {
		print('<p>Please complete all required fields</p>');
	}
?>