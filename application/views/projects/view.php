<div class="container">
	<?php $project = $project[0]; ?>
	<div class="row">
		<div class="span9">
			<div class="well">
				<h3><?php echo $project['summary']; ?></h3>
				<small>by <?php echo $project['created_by']; ?></small>
			</div> <!-- end well div -->
			<div>
				<p><?php echo $project['details']; ?></p>
			</div>
			<code>
				<a href="<?php echo $project['repository']; ?>"><?php echo $project['repository']; ?></a>
			</code>
		</div> <!-- end main content span9 -->
		<div class="span3 sidebar">
			<h4>Skills Needed</h4>
			<?php
				if(!empty($project['skills']))
				{
					$skills = explode(' ', $project['skills']);
					echo '<ol>';
					foreach($skills as $skill)
					{
						echo "<li>$skill</li>";
					}
					echo '</ol>';
				}
				else
				{
					echo '<p>No skills required.</p>';
				}
			?>
		</div> <!-- end sidebar span3 -->
	</div> <!-- end row -->
</div> <!-- end container -->