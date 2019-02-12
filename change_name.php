<?php 
	include("init.php");

	if(!isset($_SESSION['user_id'])) {
		$obj = new base_class;
		$obj->create_session("security", "Sorry you need to login");
		header("Location: login.php");
	}

	$obj = new base_class;
	if(isset($_POST['change_name'])) {
		$user_name = $obj->security($_POST['user_name']);
		$user_id = $_SESSION['user_id'];

		$user_name_status = 1;
		if(empty($user_name)) {
			$user_name_error = "Name is required";
		} else {
			if($obj->normal_query("UPDATE users SET name = ? WHERE id = ?", [$user_name, $user_id])) {
				$obj->create_session("user_name", $user_name);
				$obj->create_session("name_updated", "Name successfully updated");
				header("Location: index.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<?php include("components/css.php") ?>
</head>
<body>

	<?php include("components/nav.php") ?>

	<div class="chat-container">
		<?php include("components/sidebar.php") ?>
		<section id="right-area">
			<?php include("components/change_name_form.php") ?>
		</section> <!-- close right-area -->
	</div> <!-- close chat-container -->

	<?php include("components/js.php") ?>
</body>
</html>