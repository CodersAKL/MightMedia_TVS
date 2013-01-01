<?php echo form_open("user/auth/login");?>
	<input id="user_username" style="margin-bottom: 15px;" type="text" name="user[orderCode]" size="30" placeholder="Order Code"/>
	<input id="user_password" style="margin-bottom: 15px;" type="email" name="user[email]" size="30" placeholder="Your eMail"/>

	<input class="btn btn-block btn-primary" type="submit" name="commit" value="Log In"/>
<?php echo form_close();?>

<h1><?=_('user_password')?></h1>
<p>Please login with your email/username and password below.</p>
	
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("user/auth/login");?>
  	
  <p>
    <label for="identity">Email/Username:</label>
    <?php echo form_input($identity,'','style="margin-bottom: 15px;" placeholder="Email/Username:"');?>
  </p>

  <p>
    <label for="password">Password:</label>
    <?php echo form_input($password);?>
  </p>

  <p>
    <label for="remember">Remember Me:</label>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
    
<?php echo form_submit('submit', 'Login', 'class="btn btn-block btn-primary"');?>
    
<?php echo form_close();?>

<p><a href="forgot_password">Forgot your password?</a></p>