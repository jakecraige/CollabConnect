<style type="text/css">
/*  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }*/

  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 60px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
    margin-top: 30px;
 
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }
  .bottom-text { margin-left: 15px; }
				
</style>

<div class="container">
			<form class="form-signin" method="post">
		        <h2 class="form-signin-heading">Sign up!</h2>
		        <input type="text" name="username" class="input-block-level" placeholder="Username" value="<?php echo set_value('username'); ?>">
		        <input type="text" name="email_address" class="input-block-level" placeholder="Email Address" value="<?php echo set_value('email_address'); ?>">
		        <input type="password" name="password" class="input-block-level" placeholder="Password" value="<?php echo set_value('password'); ?>">
		       	<input type="password" name="password_confirm" class="input-block-level" placeholder="Password Confirmation">
		       		          						<?php echo validation_errors('<p class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>'); ?>

		        <button class="btn btn-large btn-primary" type="submit">Sign in</button>
	          <span class="bottom-text">Already registered? <?php echo anchor('login', 'Sign in!'); ?></span>

	      </form>
</div>