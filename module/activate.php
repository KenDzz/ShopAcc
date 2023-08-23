<?php 

if (!empty($_GET["code"]) && !empty($_GET["user"]) && !empty($_GET["email"])) {
	if (strlen($_GET["code"]) == 120) {
		$code = addslashes($_GET["code"]);
		$user = addslashes($_GET["user"]);
		$email = addslashes($_GET["email"]);
		$Func->veri_acc($code,$user,$email);
	}
	else{
		$alert->alert_error("Mã kích hoạt không hợp lệ");
	}
}
include("$_SERVER[DOCUMENT_ROOT]/trangchu.php")
?>