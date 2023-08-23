<?php
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.php");
	session_start();
	session_destroy(); //remove sid-login from server storage
	session_write_close();
	$url = BASE_URL . 'admin/index.php';
	header("Location: $url");
?>