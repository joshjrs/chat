<div class="form-area">
	<form method="POST" action="" enctype="multipart/form-data">
		<div class="group">
			<h2 class="form-heading">Create new account</h2>
		</div> <!-- close group -->
		<div class="group">
			<input type="text" name="full_name" class="control" placeholder="Enter Full Name" value="<?php echo isset($full_name) ? $full_name : ''; ?>">
			<div class="name-error error">
				<?php if(isset($name_error)): ?>
					<?php echo $name_error; ?>
				<?php endif; ?>		
			</div>
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
			<label for="file" id="file-label"><i class="fas fa-cloud-upload-alt upload-icon"></i>Choose Image</label>
			<input type="file" name="img" class="file" id="file">
			<div class="image-error error">
				<?php if(isset($image_error)): ?>
					<?php echo $image_error; ?>
				<?php endif; ?>		
			</div>
		</div> <!-- close group -->
		<div class="group">
			<input type="submit" name="signup" class="btn account-btn" value="Create Account">
		</div> <!-- close group -->
		<div class="group">
			<a href="login.php" class="link">Already have an account</a>
		</div>
	</form>
</div> <!-- close form-area -->