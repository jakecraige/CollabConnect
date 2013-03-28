<div class="container">
	<?php $project = $project[0]; ?>
	<?php //$comments = $comments[0]; ?>
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
			<div class="comments">
				<h3>Comments</h3>
				<div class="row">
					<?php if($this->user->logged_in()): ?>
						<?= form_open(base_url().'projects/comment/'.$project['id']); ?>
							<div class="span8">
								<textarea class="post_comment" name="comment"></textarea>
							</div>
							<div class="span1">
								<figure>
									<a href="<?= base_url().'/profiles/'.$username ?>">
										<img src="<?php echo gravatar_image($user_email_address); ?>" alt="Profile Image">
									</a>
								</figure>
								<input type="submit" name="submit" class="btn btn-success" value="Post">
							</div><!-- end span1 sidebar -->
						<?= form_close(); ?>
					<?php endif; ?>
					<?php foreach($comments as $comment): ?>
						<?php 
							$comment_email = $this->user->get_email_address_from_id($comment['user_id']); 
							$comment_username = $this->user->get_username($comment['user_id']);
						?>
						<div class="span9 comment well well-small">
							<blockquote>
							<div class="span8 row">
								<p><?= nl2br($comment['comment']) ?></p>
								<small>
									<?php
										echo time_ago_in_words($comment['created_at']).' by ';
										echo '<a href="'.base_url().'profiles/'.$comment_username.'">'.$comment_username.'</a>';
										if($this->session->userdata('username') == $comment_username)
										{
											echo ' | <a href="'.base_url().'projects/delete_comment/'.$comment['id'].'">Delete</a>';
										}
									?>
								</small>
							</div>
							<div class="span1 row">
								<figure>
									<a href="<?= base_url().'/profiles/'.$comment_username ?>">
										<img src="<?php echo gravatar_image($comment_email); ?>" alt="Profile Image">
									</a>
								</figure>
							</div>
						</blockquote>
						</div>
					<?php endforeach; ?>
				</div> <!-- end row -->
			</div> <!-- end comments div -->
		</div> <!-- end main content span9 -->


		<!-- SIDEBAR BEGIN -->
		<div class="span3 sidebar">
			<?php if($this->user->logged_in()): ?>
				<?php if($project['created_by'] == $this->session->userdata('username')): ?>
					<button class="btn btn-danger">Mark Completed</button>
					<a href="<?= base_url().'projects/edit/'.$project['id'] ?>" class="btn btn-primary">Edit</a>
				<?php else: ?>
					<?php if($this->project->is_member($project['id'])): ?>
						<a class="btn btn-danger" href="<?php echo base_url().'projects/leave/'.$project['id']; ?>">Leave Project</a>
					<?php else: ?>
						<a class="btn btn-success" href="<?php echo base_url().'projects/join/'.$project['id']; ?>">Join Project</a>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			<h4>Skills Needed</h4>
			<?php
				display_skills($project['skills']);
			?>
			<h4>Team Members</h4>
			<p>
				<?php $members = $this->project->get_members($project['id']); ?>
			</p>
			<ol>
				<?php foreach($members as $key=>$member): ?>
					<li><a href="<?= base_url().'profiles/'.$member ?>"><?= $member ?></a></li>
				<?php endforeach; ?>
			</ol>
		</div> <!-- end sidebar span3 -->
	</div> <!-- end row -->
</div> <!-- end container -->