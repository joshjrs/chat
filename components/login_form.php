<div class="form-area">
	<?php if(isset($_SESSION['account_success'])): ?>
		<div class="alert alert-success">
			<?php echo $_SESSION['account_success']; ?>
		</div>
	<?php endif; ?>
	<?php unset($_SESSION['account_success']); ?>

	<form method="POST" action="">
		<div class="group">
			<h2 class="form-heading">User Login</h2>
		</div> <!-- close group -->
		<div class="group">
			<input type="email" name="email" class="control" placeholder="Enter Email" value="<?php echo isset($email) ? $email : ''; ?>">
			<div class="email-error error">
				<?php if(isset($email_error)): ?>
					<?php echo $email_error; ?>
				<?php endif; ?>		
			</div>
		</div> <!-- close group -->
		<div class="group">
			<input type="password" name="password" class="control" placeholder="Create Password">
			<div class="password-error error">
				<?php if(isset($password_error)): ?>
					<?php echo $password_error; ?>
				<?php endif; ?>		
			</div>
		</div> <!-- close group -->
		<div class="group">
			<input type="submit" name="login" class="btn account-btn" value="Log In">
		</div> <!-- close group -->
		<div class="group">
			<a href="signup.php" class="link">Create new account</a>
		</div>
	</form>
</div> <!-- close form-area -->