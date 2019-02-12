<?php 
	include("init.php");

	if(!isset($_SESSION['user_id'])) {
		$obj = new base_class;
		$obj->create_session("security", "Sorry you need to login");
		header("Location: login.php");
	}

	$obj = new base_class;
	if(isset($_POST['change_img'])) {
		$img_name = $_FILES['change_img']['name'];
		$img_tmp = $_FILES['change_img']['tmp_name'];
		$img_path = "assets/img/";
		$extensions = ['jpg', 'jpeg', 'png'];
		$img_ext = explode(".",$img_name);
		$img_extension = end($img_ext);

		if(empty($img_name)) {
			$img_error = "Choose image";
		} else if(!in_array($img_extension, $extensions)) {
			$img_error = "Invalid image extension";
		} else {
			$user_id = $_SESSION['user_id'];
			move_uploaded_file($img_tmp, "$img_path/$img_name");
			if($obj->normal_query("UPDATE users SET image=? WHERE id=?", [$img_name,$user_id])) {
				$obj->create_session("update_image", "Image successfully updated");
				$obj->create_session("user_image", $img_name);
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
			<?php include("components/change_image_form.php") ?>
		</section> <!-- close right-area -->
	</div> <!-- close chat-container -->

	<?php include("components/js.php") ?>
</body>
</html>