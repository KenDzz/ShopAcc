<?php 
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/buy-acc.class.php");
	if (isset($_POST["id"])) {
		$buy = new buyaccount();
		$id_acc = $_POST["id"];
		$user_acc = $_POST["user"];
		$buy->sell_acc($id_acc,$user_acc);
	}

 ?>