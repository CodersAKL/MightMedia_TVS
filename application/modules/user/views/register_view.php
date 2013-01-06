<h3><?=_('Register')?></h3>
<p><?=_('Please enter the users information below.')?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(), 'class="form-horizontal"');?>

	<div class="control-group">
		<label class="control-label" for="first_name"><?=_('First Name')?></label>
		<div class="controls">
			<?php echo form_input($first_name, set_value('first_name', 'ssfdfs'), 'placeholder="'._('First Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="last_name"><?=_('Last Name')?></label>
		<div class="controls">
			<?php echo form_input($last_name, '', 'placeholder="'._('Last Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="company_name"><?=_('Company Name')?></label>
		<div class="controls">
			<?php echo form_input($last_name, '', 'placeholder="'._('Company Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="email"><?=_('Email')?></label>
		<div class="controls">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<?php echo form_input($email, '', 'placeholder="'._('Email').'"');?>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="phone1"><?=_('Phone')?></label>
		<div class="controls">
			<div class="input-prepend input-append">
				<?php echo form_input($phone1, '', 'class="span2" placeholder="000"');?>
				<span class="add-on">-</span>
				<?php echo form_input($phone2, '', 'class="span2" placeholder="000"');?>
				<span class="add-on">-</span>
				<?php echo form_input($phone3, '', 'class="span3" placeholder="0000"');?>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="password"><?=_('Password')?></label>
		<div class="controls">
			<div class="input-prepend input-append">
				<span class="add-on"><i class="icon-lock"></i></span>
				<?php echo form_input($password, '', 'placeholder="'._('Password').'"');?>
				<span class="add-on pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-close')"><i class="icon-eye-open"></i></span>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password_confirm"><?=_('Confirm Password')?></label>
		<div class="controls">
			<div class="input-prepend input-append">
				<span class="add-on"><i class="icon-lock"></i></span>
				<?php echo form_input($password_confirm, '', 'placeholder="'._('Confirm Password').'"');?>
				<span class="add-on pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-close')"><i class="icon-eye-open"></i></span>
			</div>
		</div>
	</div>

	<div class="form-actions">
		<?php echo form_submit('submit', _('Register'), 'class="btn btn-primary btn-large"' );?>
	</div>

<?php echo form_close();?>