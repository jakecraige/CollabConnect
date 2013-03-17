<div class="container">
	<div class="hero-unit">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<h1>Welcome to CollabConnect!</h1>
	  	<p>We're here to help you get working on projects to build your portfolio!</p>
	  	<p>
	    <a class="btn btn-primary btn-large" href="index.php/about">
	      Learn more
	    </a>
	  	</p>
	</div> <!-- hero-unit end -->
	<div class="row">
		<div class="span12">
			<?php
				/*print_r($projects);
				echo '<br><br>';*/
				foreach($projects as $project)
				{
					// print_r($project);
					echo '<blockquote class="project well well-small" 
							onclick="document.location=\''.base_url().'index.php/projects/view/'.$project['id'].'\'">';
					echo '<p>'.$project['summary'].'</p>';
					echo '<small>';
						echo $project['created_at'].' by ';
						echo '<a href="'.base_url().'index.php/profiles/'.$project['created_by'].'">'.$project['created_by'].'</a>';
					echo '</small>';
					echo '</blockquote>';
				}
			?>
			<blockquote class="project well well-small" onclick="document.location='http://www.google.com'">
				<p>
					Collaboration portal where users can go and find other developers
					to collaborate with.
				</p>
				<small>
					6 hours ago by <a href="<?php echo base_url(); ?>profiles/jCraige">jCraige</a>
				</small>
			</blockquote>
			<blockquote class="project well well-small">
				<p>
					Basic streaming music site where users can register and upload their
					favorite songs to share them
				</p>
				<small>
					8 hours ago by <a href="<?php echo base_url(); ?>profiles/bob.loren">bob.loren</a>
				</small>
			</blockquote>
			<blockquote class="project well well-small">
				<p>
					Simple social network with profile pages, messages, and an 
					auththentication system
				</p>
				<small>
					2 days ago by <a href="<?php echo base_url(); ?>profiles/WannaBeACoder">WannaBeACoder</a>
				</small>
			</blockquote>
			<blockquote class="project well well-small">
				<p>
					Basic streaming music site where users can register and upload their
					favorite songs to share them
				</p>
				<small>
					8 hours ago by <a href="<?php echo base_url(); ?>profiles/bob.loren">bob.loren</a>
				</small>
			</blockquote>
			<blockquote class="project well well-small">
				<p>
					Simple social network with profile pages, messages, and an 
					auththentication system
				</p>
				<small>
					2 days ago by <a href="<?php echo base_url(); ?>profiles/WannaBeACoder">WannaBeACoder</a>
				</small>
			</blockquote>

			<div class="pagination">
			  <ul>
			    <li class="disabled"><a href="#">&laquo;</a></li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">&raquo;</a></li>
			  </ul>
			</div>
		</div><!-- end span8 -->
		<!-- <div class="span3 sidebar">
			<div class="well">
				<h3>Recent</h3>
				<p>Project 1 link here</p>
				<p>Project 2 link here</p>
				<p>Project 3 link here</p>
				<p>Project 4 link here</p>
			</div>
		</div> --> <!-- span3 sidebar end -->
	</div><!-- end row -->
</div><!-- end container -->