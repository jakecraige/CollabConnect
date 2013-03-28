<div class="container">
<?php $project = $project[0]; ?>
	<div class="row">
		<div class="span7">
			<?php
				if(!empty($errors)) { //Echo out errors if any
					echo "<p class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>$errors</p>";
				}
				echo validation_errors('<p class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>');
			?>
			<?php 
				echo form_open(); 
			?>
				<fieldset>
					<legend>Update a Project</legend>
					<label>Summary</label>
						<input type="text" class="details" name="summary" placeholder="Brief summary to display to users" value="<?= $project['summary'] ?>">
					<label>Details</label>
						<textarea class="create_details" name="details" placeholder="Let the users know more details about the project here." rows="7"><?= $project['details'] ?></textarea>
					<label>Repository Link</label>
					<input type="text" class="details" name="repository" placeholder="http://github.com/username/RepoName" value="<?= $project['repository'] ?>">
					<label>Skills Used</label>
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