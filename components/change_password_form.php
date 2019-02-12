<div class="form-section">
	<div class="form-grid">
		<form method="POST" action="">
			<div class="group">
				<h2 class="form-heading">Change Password</h2>
			</div> <!-- close group -->
			<div class="group">
				<input type="password" name="current_password" class="control" placeholder="Enter Current Password">
				<div class="current-password-error error">
					<?php if(isset($current_password_error)): ?>
						<?php echo $current_password_error; ?>
					<?php endif; ?>		
				</div>
			</div> <!-- close group -->
			<div class="group">
				<input type="password" name="new_password" class="control" placeholder="Enter New Password">
				<div class="new-password-error error">
					<?php if(isset($new_password_error)): ?>
						<?php echo $new_password_error; ?>
					<?php endif; ?>		
				</div>
			</div> <!-- close group -->
			<div class="group">
				<input type="password" name="retype_password" class="control" placeholder="Enter New Password Again">
				<div class="retype-password-error error">
					<?php if(isset($retype_password_error)): ?>
						<?php echo $retype_password_error; ?>
					<?php endif; ?>		
				</div>
			</div> <!-- close group -->
			<div class="group">
				<input type="submit" name="change_password" class="btn account-btn" value="Save Changes">
			</div> <!-- close group -->
		</form>
	</div> <!-- close form-grid -->
</div> <!-- close form-section -->