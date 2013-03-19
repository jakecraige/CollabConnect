<?php 
	$user = $user[0]; 
?>
<div class="container">
	<div class="row">
		<div class="span9">
			<?php if(!empty($errors)): ?>
				<p class="alert alert-error"><?= $errors ?></p>
			<?php endif; ?>
			<h4>About Me!</h4>
			<?php if(!empty($user['about'])): ?>
				<p><?= nl2br($user['about']) ?></p>
			<?php else: ?>
				<p>User has not updated this section yet.</p>
			<?php endif; ?>
			<hr>
			<h4>Current Projects</h4>
			<?php
			foreach($projects as $project)
			{
				// print_r($project);
				echo '<blockquote class="projects" 
						onclick="document.location=\''.base_url().'projects/view/'.$project['id'].'\'">';
				echo '<p>'.$project['summary'].'</p>';
				echo '<small>';
					echo time_ago_in_words($project['created_at']).' by ';
					echo '<a href="'.base_url().'profiles/'.$project['created_by'].'">'.$project['created_by'].'</a>';
				echo '</small>';
				echo '</blockquote>';
			}
			?>
		</div>
		<div class="span3">
			<div class="well well-small">
				<figure>
					<img src="<?php echo gravatar_image($user['email_address']); ?>" alt="Profile Picture">
				</figure>
				<h3 class="text-center"><?= $user['username'] ?></h3>
			</div>
			<div class="well well-small">
				<h4>Skills</h4>
				<?php display_skills($user['skills']); ?>
			</div>
			<div class="well well-small">
				<h4>Contact</h4>
				<p><a href="#">Send Message</a></p>
				<?php if(!empty($user['website'])): ?>
					<h4>Website</h4>
					<p><a href="<?= $user['website'] ?>"><?= $user['website'] ?></a></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>