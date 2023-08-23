<?php
$id = $_GET["id"];
$id_check = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, $id);
if (isset($id_check) && is_numeric($id_check)) {
	$id_safe = addslashes($id_check);
	$Func->show_acc($id_safe);
	if (isset($_SESSION["username"])) {
		$user = $_SESSION["username"];
		echo "<input type='hidden' id='user' value='".$user."'>";
	}
	else{
		echo "<input type='hidden' id='user' value=''>";
	}
}
else{
	$url = BASE_URL;
	header("Location: $url");
} 
?>
