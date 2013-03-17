<div class="container">
	<?php $project = $project[0]; ?>
	<div class="row">
		<div class="span9">
			<div class="well">
				<blockquote>
				<h3><?php echo $project['summary']; ?></h3>
				<small>
					<?php
						echo time_ago_in_words($project['created_at']).' by ';
						echo '<a href="'.base_url().'profiles/'.$project['created_by'].'">'.$project['created_by'].'</a>';
					?>
				</small>
			</blockquote>
			</div> <!-- end well div -->
			<div>
				<p><?php echo nl2br($project['details']); ?></p>
			</div>
			<code>
				<a href="<?php echo $project['repository']; ?>"><?php echo $project['repository']; ?></a>
			</code>
		</div> <!-- end main content span9 -->
		<div class="span3 sidebar">
			<button class="btn btn-danger">Mark Completed</button>
			<button class="btn btn-primary">Edit</button>
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
			<h4>Team Members</h4>
			<ol>
				<li><a href="#">jCraige</a></li>
				<li><a href="#">bob.lundsford</a></li>
				<li><a href="#">wannabeCoder</a></li>
				<li><a href="#">forksANDknives</a></li>
			</ol>
		</div> <!-- end sidebar span3 -->
	</div> <!-- end row -->
</div> <!-- end container -->