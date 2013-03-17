<div class="container">
	<div class="hero-unit">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
	  	<h1>Welcome to CollabConnect!</h1>
	  	<p>We're here to help you get working on projects to build your portfolio!</p>
	  	<p>
	    <a class="btn btn-primary btn-large" href="about">
	      Learn more
	    </a>
	  	</p>
	</div> <!-- hero-unit end -->
	<div class="row">
		<div class="span12">
			<?php 
				if($this->session->flashdata('messages'))
				{
					echo '<p class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'
                      .$this->session->flashdata('messages').'</p>';
				}
	
				foreach($projects as $project)
				{
					// print_r($project);
					echo '<blockquote class="well well-small projects" 
							onclick="document.location=\''.base_url().'projects/view/'.$project['id'].'\'">';
					echo '<p>'.$project['summary'].'</p>';
					echo '<small>';
						echo time_ago_in_words($project['created_at']).' by ';
						echo '<a href="'.base_url().'profiles/'.$project['created_by'].'">'.$project['created_by'].'</a>';
					echo '</small>';
					echo '</blockquote>';
				}
			?>
			<!-- <div class="pagination">
			  <ul>
			    <li class="disabled"><a href="#">&laquo;</a></li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">&raquo;</a></li>
			  </ul>
			</div> -->
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