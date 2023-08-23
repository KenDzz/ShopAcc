<?php
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	include_once("$_SERVER[DOCUMENT_ROOT]/facebook/fb-config.php");
	session_start();
	$days = 30;
    setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000) );
	session_destroy(); //remove sid-login from server storage
	unset($_SESSION['username']);
	unset($_SESSION['fbUserId']);
    unset($_SESSION['fbUserName']);
    unset($_SESSION['fbAccessToken']);
	session_write_close();
	$url = BASE_URL;
	header("Location: $url");
?>