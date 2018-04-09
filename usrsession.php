<?php
	include('info.php');
	session_start();

	$user_check = $_SESSION['user_id'];

	$ses_sql = mysqli_query($link, "select username from customerlogin where username = '$user_check' ");

	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

	$login_session = $row['username'];

	if(!isset($_SESSION['user_id'])) {
		header("location:customersignin.php");
	}
	else{
		header("location:Index.php");
	}
?>