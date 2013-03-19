<?php $user = $user[0]; ?>
<div class="container">
	<div class="row">
		<div class="span9">
			<?php if(!empty($errors)): ?>
				<p class="alert alert-error"><?= $errors ?></p>
			<?php endif; ?>
			<h4>About Me!</h4>
			<p>
				<?= $user['about'] ?>
			</p>
			<hr>
			<h4>Current Projects</h4>
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
				<ol>
					<li>PHP</li>
					<li>MySQL</li>
					<li>HTML</li>
				</ol>
			</div>
			<div class="well well-small">
				<h4>Contact</h4>
				<p><a href="#">Send Message</a></p>
				<h4>Website</h4>
				<p><a href="<?= $user['website'] ?>"><?= $user['website'] ?></a></p>
			</div>
		</div>
	</div>
</div>