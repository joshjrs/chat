<?php 
	include("../init.php");

	$obj = new base_class;
	$status = 1;
	if($obj->normal_query("SELECT id FROM users WHERE status = ?", [$status])) {
		$online_users = $obj->count_rows();
		echo json_encode(array("users" => $online_users));
	}
?>