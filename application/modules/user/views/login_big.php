<h3><?=_( 'Login' )?></h3>
<?php if ( empty( $message ) ): ?>
	<p>
		<?= _( 'Please login with your email/username and password below.' ) ?>
	</p>
<?php endif ?>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open( "user/login" ); ?>

<p>
	<label for="identity"><?=_( 'Email/Username' )?>:</label>
	<?php echo form_input( $identity );?>
</p>

<p>
	<label for="password"><?=_( 'Password' )?>:</label>
	<?php echo form_input( $password );?>
</p>

<p>
	<label for="remember" class="checkbox">
		<?=_( 'Remember Me' )?>
		<?php echo form_checkbox( 'remember', '1', FALSE, 'id="remember"' );?>
	</label>
</p>

<div class="form-actions">
	<?php echo form_submit( 'submit', _( 'Login' ), 'class="btn btn-primary btn-large"' );?>
</div>

<?php echo form_close(); ?>

<p><?=anchor( 'user/forgot_password', _( 'Forgot your password?' ) )?></p>
<p><?=anchor( 'user/register', _( 'Not a member yet? Register here!' ) )?></p>