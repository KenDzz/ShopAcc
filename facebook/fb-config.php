<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 
include_once('php-graph-sdk-5.x/src/Facebook/autoload.php');
$fb = new Facebook\Facebook(array(
	'app_id' => '553253088944677', // Replace with your app id
	'app_secret' => 'b5dc0c696637cac84bfcead3a681e8f1',  // Replace with your app secret
	'default_graph_version' => 'v3.2',
));

$helper = $fb->getRedirectLoginHelper();
?>