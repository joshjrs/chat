<?php 
	include("init.php");
	$obj = new base_class;
	$status = 0;
	if($obj->normal_query("UPDATE users SET status = ? WHERE id = ?", [$status,$_SESSION['user_id']])) {
		session_destroy();
		header("Location: login.php");
	}
	
?>