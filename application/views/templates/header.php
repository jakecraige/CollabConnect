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
	                  <li><a href="#"><i class="icon-user"></i> Browse Projects</a></li>
	                  <li><a href="#"><i class="icon-time"></i> My Projects</a></li>
	                  <li><a href="#"><i class="icon-time"></i> Create Project</a></li>
	                </ul>
              	</li>
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

		      	<li><a href="#">Logout</a></li>

	    	</ul>
	  	</div>
	</div>
	<div id="wrap">

