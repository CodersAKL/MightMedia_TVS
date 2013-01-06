<h3><?=_( 'Login' )?></h3>
<?php if ( empty( $message ) ): ?>
	<p>
		<?= _( 'Please login with your email/username and password below.' ) ?>
	</p>
<?php endif ?>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open( current_url(), 'class="form-horizontal"' ); ?>

<div class="control-group">
	<label class="control-label" for="identity"><?=$identity_label?></label>
	<div class="controls">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<?php echo form_input($identity, '', 'placeholder="'.$identity_label.'" class=""');?>
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="password"><?=_('Password')?></label>
	<div class="controls">
		<div class="input-prepend input-append">
			<span class="add-on"><i class="icon-lock"></i></span>
			<?php echo form_input($password, '', 'placeholder="'._('Password').'"');?>
			<span class="add-on pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-open icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-open icon-eye-close')"><i class="icon-eye-close"></i></span>
		</div>
	</div>
</div>
<div class="control-group">
	<div class="controls">
		<label class="checkbox" for="remember">
			<?php echo form_checkbox( 'remember', '1', FALSE, 'id="remember"' );?>
			<?=_( 'Remember Me' )?>
		</label>
	</div>
</div>

<div class="form-actions">
		<span class="span3">
			<?php echo form_submit( 'submit', _( 'Login' ), 'class="btn btn-primary btn-large"' );?>
		</span>
		<span class="span9">
			<?=anchor( 'user/forgot_password', _( 'Forgot your password?' ) )?><br/>
			<?=anchor( 'user/register', _( 'Not a member yet? Register here!' ) )?>
		</span>

</div>

<?php echo form_close(); ?>

