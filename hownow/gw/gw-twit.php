<?php
set_include_path(get_include_path() . ':/usr/local/lib/php');
# set_include_path(':/usr/local/lib/php');

require_once('Arc90/Service/Twitter.php');

/* MAY AT SOME POINT WANT TO SYNC THE TWITTER UPDATE DATE WITH EMOTAG DATE
 * NOT TODAY
 */

$twitter = new Arc90_Service_Twitter('how_now', 'doodoo69');

$src='twitter';

try
{ 
	// Gets the authenticated user's friends timeline in XML format
	# $resp = $twitter->createFriendship('ta_eating', $format ='json');
	$resp = $twitter->destroyFriendship('ta_eating', $format ='json');
	# $resp = $twitter->leave('ta_eating', 'xml');

	// Print the XML response
	echo $resp->getData() . "\n";

	// If Twitter returned an error (401, 503, etc), print status code
	if($resp->isError()) {
		echo $resp->http_code . "\n";
	}
}

catch(Arc90_Service_Twitter_Exception $e) {
	// Print the exception message (invalid parameter, etc)
	print $e->getMessage();
}

?>
