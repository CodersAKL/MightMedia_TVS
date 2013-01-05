<h3><?=_('Login')?></h3>
<?php if ( empty( $message ) ):?>
<div class="alert alert-info">
	<?=_('Please login with your email/username and password below.')?>
</div>
<?php endif?>
	
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("user/login");?>
  	
  <p>
    <label for="identity"><?=_('Email/Username')?>:</label>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <label for="password"><?=_('Password')?>:</label>
    <?php echo form_input($password);?>
  </p>

  <p>
    <label for="remember" class="checkbox">
	    <?=('Remember Me')?>
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
    </label>
  </p>
    
    
  <p><?php echo form_submit('submit', _('Login'), 'class="btn info big"');?></p>
    
<?php echo form_close();?>

<p><?=anchor('user/forgot_password',_('Forgot your password?'))?></p>
<p><?=anchor('user/register',_('Not a member yet? Register here!'))?></p>