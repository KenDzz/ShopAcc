<?php
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
	session_destroy();
	unset($_SESSION['author']);
	session_write_close();
	$url = BASE_URL."/admin";
	echo("<script>location.href = '".$url."';</script>");
?>