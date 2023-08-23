<?php
session_start();
include_once("$_SERVER[DOCUMENT_ROOT]/Controller/config.class.php");
$db = connectDB();
$email = $_POST['username'];
$password = $_POST['password'];
if (isset($email) && isset($password)) {
	$usernameEmail = addslashes($email);
	$md5_password = md5(addslashes($password));
	$stmt = $db->prepare("SELECT * FROM shop_admin WHERE  email=:usernameEmail AND  password=:md5_password");
	$stmt->bindParam("usernameEmail", $email, PDO::PARAM_STR);
	$stmt->bindParam("md5_password", $md5_password, PDO::PARAM_STR);
	$stmt->execute();
	$count = $stmt->rowCount();
	$data = $stmt->fetch(PDO::FETCH_OBJ);
	if ($count) {
		$_SESSION['author'] = $data->author;
		echo 1;
	} else {
		echo 0;
	}
  $db = null;
}
?>