<?php $user = $user[0]; ?>
<div class="container">
	<div class="row">
		<div class="span9">
			<?php if(!empty($errors)): ?>
				<p class="alert alert-error"><?= $errors ?></p>
			<?php endif; ?>
			<h3><?php echo $user['username']; ?></h3>
		</div>
		<div class="span3">
			<div class="well well-small">
				<img src="http://gravatar.com/avatar/<?php echo md5($user['email_address']); ?>" alt="Profile Picture">
			</div>
			<div class="well well-small">
				<h4>Contact</h4>
				<p><a href="#">Send Message</a></p>
			</div>
			<div class="well well-small">
				<h4>Skills</h4>
				<ol>
					<li>PHP</li>
					<li>MySQL</li>
					<li>HTML</li>
				</ol>
			</div>
		</div>
	</div>
</div>