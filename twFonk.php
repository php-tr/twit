<?php
require_once('oAuth/twitteroauth.php');

function twitUpdate($icerik)
{
	$consumerKey = '';
	$consumerSecret = '';
	$oAuthToken = '';
	$oAuthSecret = '';
	$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
	$connection->post('statuses/update', array('status' => $icerik));
}


?>