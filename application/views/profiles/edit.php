<div class="container">
	<?php $user = $user[0]; ?>
	<div class="row">
		<div class="span7">
			<?php
				if(!empty($errors)) { //Echo out errors if any
					echo "<p class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$errors</p>";
				}
				if($this->session->flashdata('user_update')) {
					echo "<p class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>".$this->session->flashdata('user_update')."</p>";
				}
				if($this->session->flashdata('user_update_error')) {
					echo "<p class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>".$this->session->flashdata('user_update_error')."</p>";
				}


				echo validation_errors('<p class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>');
				echo form_open(); 
			?>
				<fieldset>
					<legend>Edit Your Profile - <?= $user['username'] ?></legend>
					<label>About me</label>
						<textarea class="create_details" name="about" placeholder="Let the users know more about you here." rows="7"><?= $user['about']; ?></textarea>
					<label>Your Website</label>
					<input type="text" class="details" name="website" placeholder="http://yourname.com" 
						value="<?= $user['website'] ?>">
					<label>Your Skills</label>
						<label class="checkbox inline">
						  	<input type="checkbox" name="skills[]" value="PHP"> PHP
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" name="skills[]" value="MySQL"> MySQL
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" name="skills[]" value="Ruby/Rails"> Ruby/Rails
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" name="skills[]" value="Javascript"> Javascript
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" name="skills[]" value="jQuery"> jQuery
						</label>
					<br><br>
					<input type="submit" name="submit" class="btn btn-success">

				</fieldset>
			<?php echo form_close(); ?>
		</div> <!-- end span7 -->
	</div> <!-- end row -->
</div> <!-- end container -->