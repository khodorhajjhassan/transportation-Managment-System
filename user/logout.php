<?php
require_once('../config.php');
require_once '../controller_login/user_functions.php';
	session_start();
	isOnline($conn,0,$_SESSION["id"]);
	session_unset();
	session_destroy();
	header("location: ../main/login.php?msg=logout_success");



?>