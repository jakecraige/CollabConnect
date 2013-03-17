<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" media="all">
</head>
<body>
	<div class="navbar">
	  	<div class="navbar-inner">
	   	 	<a class="brand" href="<?php echo base_url(); ?>">CollabConnect</a>
	    	<ul class="nav">
		      	<li class="dropdown active">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
	                <ul class="dropdown-menu">
		                <li><a href="<?php echo base_url(); ?>"><i class="icon-user"></i> Browse Projects</a></li>
		                <?php 
		                  	if($this->user->logged_in())
		                  	{
		                  		echo '<li><a href="'.base_url().'projects/me"><i class="icon-time"></i> My Projects</a></li>';
		                  		echo '<li><a href="'.base_url().'projects/create"><i class="icon-time"></i> Create Project</a></li>';
		              		}
		              	?>
	                </ul>
              	</li>
              	<?php if($this->user->logged_in()): ?>
			      	<li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li><a href="#"><i class="icon-user"></i> View profile</a></li>
		                  <li><a href="#"><i class="icon-time"></i> Edit profile</a></li>
		                </ul>
	              	</li>
	              	<li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Message <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li><a href="#"><i class="icon-user"></i> View messages</a></li>
		                  <li><a href="#"><i class="icon-time"></i> Send message</a></li>
		                </ul>
	              	</li>
                <?php else: ?>	              	
				    <li><a href="<?= base_url() ?>login">Login</a></li>
				    <li><a href="<?= base_url() ?>register">Register</a></li>
			    <?php endif; ?>
	    	</ul> <!-- end navbar inner -->
	    	<?php
	    		if($this->user->logged_in())
	    		{
		    		echo'<ul class="nav pull-right">';
			    	echo'  	<li class="pull-right"><a href="'.base_url().'logout">Logout</a></li>';
	    			echo'</ul> <!-- end pul-right nav -->';
	    		}
	    	?>
	  	</div>
	</div>
	<div id="wrap">

