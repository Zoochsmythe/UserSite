<?php
	include('info.php');
	include('login.php');

	session_start();
	$cUser = $_SESSION['login_user'];
	$logoutSQL = "UPDATE Admin SET logged_in='0' WHERE username='$cUser'";
	$changed = mysqli_query($link, $logoutSQL);

	if(session_destroy()) {
		header("Location:Index.php");
	}
?>