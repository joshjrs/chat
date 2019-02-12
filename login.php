<?php 
	include("init.php");

	$obj = new base_class;
	if(isset($_POST['login'])) {
		$email = $obj->security($_POST['email']);
		$password = $obj->security($_POST['password']);
		$email_status = $password_status = 1;

		if(empty($email)) {
			$email_error = "Email is required";
			$email_status = "";
		}

		if(empty($password)) {
			$password_error = "Password is required";
			$password_status = "";
		}

		if(!empty($email_status) && !empty($password_status)) {
			if($obj->normal_query("SELECT * FROM users WHERE email = ?", [$email])) {
				if($obj->count_rows() == 0) {
					$email_error = "Email does not exist";
				} else {
					$row = $obj->single_result();
					$db_email = $row->email;
					$db_password = $row->password;
					$db_user_id = $row->id;
					$user_name = $row->name;
					$user_image = $row->image;
					$clean_status = $row->clean_status;

					if(password_verify($password, $db_password)) {
						$status = 1;
						$obj->normal_query("UPDATE users SET status = ? WHERE id = ?", [$status,$db_user_id]);
						if($clean_status == 0) {
							if($obj->normal_query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1")) {
								$last_row = $obj->single_result();
								$last_msg_id = $last_row->msg_id + 1;

								if($obj->normal_query("INSERT INTO clean (clean_message_id,clean_user_id) VALUES (?,?)", [$last_msg_id,$db_user_id])) {
									$update_clean_status = 1;
									$obj->normal_query("UPDATE users SET clean_status = ? WHERE id =?", [$update_clean_status, $db_user_id]);

									$login_time = time();
									if($obj->normal_query("SELECT * FROM users_activities WHERE user_id = ?", [$db_user_id])) {
										$activity_row = $obj->single_result();
										if($activity_row == 0) {
											$obj->normal_query("INSERT INTO users_activities (user_id,login_time) VALUES (?,?)", [$db_user_id,$login_time]);
											$obj->create_session("user_name", $user_name);
											$obj->create_session("user_id", $db_user_id);
											$obj->create_session("user_image", $user_image);
											$obj->create_session("loader", "1");
											header("Location: index.php");
										} else {
											$obj->normal_query("UPDATE users_activities SET login_time = ? WHERE user_id = ?", [$login_time,$db_user_id]);
											$obj->create_session("user_name", $user_name);
											$obj->create_session("user_id", $db_user_id);
											$obj->create_session("user_image", $user_image);
											$obj->create_session("loader", "1");
											header("Location: index.php");
										}
									}
								}
							}
						} else {
							$login_time = time();
							if($obj->normal_query("SELECT * FROM users_activities WHERE user_id = ?", [$db_user_id])) {
								$activity_row = $obj->single_result();
								if($activity_row == 0) {
									$obj->normal_query("INSERT INTO users_activities (user_id,login_time) VALUES (?,?)", [$db_user_id,$login_time]);
									$obj->create_session("user_name", $user_name);
									$obj->create_session("user_id", $db_user_id);
									$obj->create_session("user_image", $user_image);
									$obj->create_session("loader", "1");
									header("Location: index.php");
								} else {
									$obj->normal_query("UPDATE users_activities SET login_time = ? WHERE user_id = ?", [$login_time,$db_user_id]);
									$obj->create_session("user_name", $user_name);
									$obj->create_session("user_id", $db_user_id);
									$obj->create_session("user_image", $user_image);
									$obj->create_session("loader", "1");
									header("Location: index.php");
								}
							}
						}
					} else {
						$password_error = "Please enter correct password";
					}
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
	<title>Create New Account</title>
	<?php include("components/css.php") ?>
</head>
<body>
	<?php
		if(isset($_SESSION['security'])):
	?>
	<div class="flash error-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="cross">&#x2715;</span>Error!</h3>
		</div>
		<div class="flash-body">
			<p><?php echo $_SESSION['security']; ?></p>
		</div>
	</div> 
	<?php 
		endif;
		unset($_SESSION['security']);
	?>

	<div class="signup-container">
		<div class="account-left">
			<div class="account-text">
				<h1>Lets Chat</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. </p>
			</div> <!-- close account-text -->
		</div> <!-- close account-left -->

		<div class="account-right">
			<?php include("components/login_form.php") ?>
		</div> <!-- close account-right -->
	</div>
	<!-- close signup-container -->

	<?php include("components/js.php") ?>
</body>
</html>