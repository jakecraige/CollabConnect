<div class="container">
	<div class="row">
		<div class="span7">
			<?php echo form_open(); ?>
				<fieldset>
					<legend>Create a Project</legend>
					<label>Summary</label>
						<input type="text" class="details" placeholder="Brief summary to display to users">
					<label>Details</label>
						<textarea class="create_details" rows="7">Inform the users on any specific details or requirements neccesary to complete the project.</textarea>
					<label>Repository Link</label>
					<input type="text" class="details" placeholder="http://github.com/username/RepoName">
					<label>Skills Used</label>
						<label class="checkbox inline">
						  	<input type="checkbox" id="lang[]" value="PHP"> PHP
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" id="lang[]" value="MySQL"> MySQL
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" id="lang[]" value="Ruby"> Ruby/Rails
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" id="lang[]" value="Javascript"> Javascript
						</label>
						<label class="checkbox inline">
						 	 <input type="checkbox" id="lang[]" value="jQuery"> jQuery
						</label>
					<br><br>
					<input type="submit" class="btn btn-success">

				</fieldset>
			<?php echo form_close(); ?>
		</div> <!-- end span7 -->
	</div> <!-- end row -->
</div> <!-- end container -->