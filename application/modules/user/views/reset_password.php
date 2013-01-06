<h3><?=__('Change Password')?></h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(), 'class="form-horizontal"');?>


<div class="control-group">
	<label class="control-label" for="password">New Password (at least <?php echo $min_password_length;?> characters long):</label>
	<div class="controls">
		<div class="input-prepend input-append">
			<span class="add-on"><i class="icon-lock"></i></span>
			<?php echo form_input($new_password, '', 'placeholder="'.__('Password').'"');?>
			<span class="add-on pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-open icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-open icon-eye-close')"><i class="icon-eye-close"></i></span>
		</div>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="new_confirm"><?=__('Confirm New Password')?>:</label>
	<div class="controls">
		<div class="input-prepend input-append">
			<span class="add-on"><i class="icon-lock"></i></span>
			<?php echo form_input($new_password_confirm, '', 'placeholder="'.__('Confirm Password').'"');?>
			<span class="add-on pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-open icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-open icon-eye-close')"><i class="icon-eye-close"></i></span>
		</div>
	</div>
</div>

<?php echo form_input($user_id);?>
<?php echo form_hidden($csrf); ?>

<div class="form-actions">
	<?php echo form_submit('submit', __('Change'), 'class="btn btn-primary btn-large"' );?>
</div>

<?php echo form_close();?>