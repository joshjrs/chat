<?php 
	include("init.php");

	if(!isset($_SESSION['user_id'])) {
		$obj = new base_class;
		$obj->create_session("security", "Sorry you need to login");
		header("Location: login.php");
	}

	$obj = new base_class();
	if(isset($_POST['change_password'])) {
		$current_password = $obj->security($_POST['current_password']);
		$new_password = $obj->security($_POST['new_password']);
		$retype_password = $obj->security($_POST['retype_password']);

		$current_status = $new_status = $retype_status = 1;
		if(empty($current_password)) {
			$current_password_error = "Current password is required";
			$current_status = "";
		}

		if(empty($new_password)) {
			$new_password_error = "New password is required";
			$new_status = "";
		} else if(strlen($new_password) < 5) {
			$new_password_error = "New password is short";
			$new_status = "";
		}

		if(empty($retype_password)) {
			$retype_password_error = "Retype password is required";
			$retype_status = "";
		} else if($new_password != $retype_password) {
			$retype_password_error = "Retype and new password does not match";
			$retype_status = "";
		}

		if(!empty($current_status) && !empty($new_status) && !empty($retype_status)) {
			$user_id = $_SESSION['user_id'];
			if($obj->normal_query("SELECT password FROM users WHERE id=?", [$user_id])) {
				$row = $obj->single_result();
				$db_password = $row->password;
				if(password_verify($current_password, $db_password)) {
					if($obj->normal_query("UPDATE users SET password=? WHERE id=?", [password_hash($new_password,PASSWORD_DEFAULT),$user_id])) {
						$obj->create_session("password_updated", "Password successfully updated");
						header("Location: index.php");
					}
				} else {
					$current_password_error = "Current password is incorrect";
				}
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
			<?php include("components/change_password_form.php") ?>
		</section> <!-- close right-area -->
	</div> <!-- close chat-container -->

	<?php include("components/js.php") ?>
</body>
</html>