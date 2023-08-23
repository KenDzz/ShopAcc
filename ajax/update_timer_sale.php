<?php 
	include_once("$_SERVER[DOCUMENT_ROOT]/Controller/function.class.php");
	if (isset($_POST["id"])) {
		$Func = new Function_class();
		$id = addslashes($_POST["id"]);
		if (is_numeric($id)) {
			$Func->update_status($id);
		}
	}

 ?>