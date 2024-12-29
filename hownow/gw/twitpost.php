/*
 * THIS LITTLE BIT OF CODE WORKS FOR POSTING TO TWITTER
 */
<?php

$email = 'minitru';
$password = 'doodoo69';
$status = urlencode( "hello world from ny" );

$url = "http://twitter.com/statuses/update.xml";

$session = curl_init();
curl_setopt ( $session, CURLOPT_URL, $url );
curl_setopt ( $session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
curl_setopt ( $session, CURLOPT_HEADER, false );
curl_setopt ( $session, CURLOPT_USERPWD, $email . ":" . $password );
curl_setopt ( $session, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $session, CURLOPT_POST, 1);
curl_setopt ( $session, CURLOPT_POSTFIELDS,"status=" . $status);
$result = curl_exec ( $session );
curl_close( $session );

echo( $result );

?>
