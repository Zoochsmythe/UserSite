<?php
	include('info.php');
	session_start();

	$user_check = $_SESSION['login_user'];

	$ses_sql = mysqli_query($link, "select username from Admin where username = '$user_check' ");

	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

	$login_session = $row['username'];

	if(!isset($_SESSION['login_user'])) {
		header("location:login.php");
	}
	else{
		header("location:admin.php");
	}
?>