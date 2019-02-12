<?php 
	include("init.php");
	if(!isset($_SESSION['user_id'])) {
		$obj = new base_class;
		$obj->create_session("security", "Sorry you need to login");
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
	<title>Home</title>
	<?php include("components/css.php"); ?>
</head>
<body>
	<?php if(isset($_SESSION['loader'])): ?>
		<div class="loader-area">
			<div class="loader">
				<div class="loader-item">
					
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php unset($_SESSION['loader']); ?>

	<?php
		if(isset($_SESSION['password_updated'])):
	?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Success!</h3>
			</div>
			<div class="flash-body">
				<p><?php echo $_SESSION['password_updated']; ?></p>
			</div>
		</div>
	<?php 
		endif;
		unset($_SESSION['password_updated']);
	?>

	<?php
		if(isset($_SESSION['name_updated'])):
	?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Success!</h3>
			</div>
			<div class="flash-body">
				<p><?php echo $_SESSION['name_updated']; ?></p>
			</div>
		</div>
	<?php 
		endif;
		unset($_SESSION['name_updated']);
	?>

	<?php
		if(isset($_SESSION['update_image'])):
	?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Success!</h3>
			</div>
			<div class="flash-body">
				<p><?php echo $_SESSION['update_image']; ?></p>
			</div>
		</div>
	<?php 
		endif;
		unset($_SESSION['update_image']);
	?>

	<!-- <div class="flash error-flash">
		<span class="remove">&times;</span>
		<div class="flash-heading">
			<h3><span class="cross">&#x2715;</span>Error!</h3>
		</div>
		<div class="flash-body">
			<p>You need to log in!</p>
		</div>
	</div> -->

	<?php include("components/nav.php"); ?>

	<div class="chat-container">
		<?php include("components/sidebar.php"); ?>
		<section id="right-area">
			<?php include("components/messages.php"); ?>
			<?php include("components/chat_form.php"); ?>
			<?php include("components/emoji.php"); ?>
		</section> <!-- close right-area -->
	</div> <!-- close chat-container -->

	<?php include("components/js.php"); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".loader-area").show();
			setTimeout(function() {
				$(".loader-area").hide();
			}, 2000)
		})
	</script>
</body>
</html>