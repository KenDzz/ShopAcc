<?php
include_once('fb-config.php');
session_destroy();
unset($_SESSION['fbUserId']);
unset($_SESSION['fbUserName']);
unset($_SESSION['fbAccessToken']);
header('location: https://chunkaiin.site/loginfacebook/index.php');
exit;
?>