<div class="form-section">
	<div class="form-grid">
		<form method="POST" action="">
			<div class="group">
				<h2 class="form-heading">Change Name</h2>
			</div> <!-- close group -->
			<div class="group">
				<input type="text" name="user_name" class="control" placeholder="Enter Name" value="<?php echo $_SESSION['user_name']; ?>">
			</div> <!-- close group -->
			
			<div class="group">
				<input type="submit" name="change_name" class="btn account-btn" value="Save Changes">
			</div> <!-- close group -->
		</form>
	</div> <!-- close form-grid -->
</div> <!-- close form-section -->