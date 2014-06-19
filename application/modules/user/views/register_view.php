<h3><?=__('Register')?></h3>
<p><?=__('Please enter the users information below.')?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(), 'class="form-horizontal"');?>

	<div class="control-group">
		<label class="control-label" for="first_name"><?=__('First Name')?></label>
		<div class="controls">
			<?php echo form_input($first_name, set_value('first_name', 'ssfdfs'), 'placeholder="'.__('First Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="last_name"><?=__('Last Name')?></label>
		<div class="controls">
			<?php echo form_input($last_name, '', 'placeholder="'.__('Last Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="company_name"><?=__('Company Name')?></label>
		<div class="controls">
			<?php echo form_input($company, '', 'placeholder="'.__('Company Name').'" class="span4"');?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="email"><?=__('Email')?></label>
		<div class="controls">
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-envelope"></i></span>
				<?php echo form_input($email, '', 'placeholder="'.__('Email').'"');?>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="phone1"><?=__('Phone')?></label>
		<div class="controls">
			<div class="input-group input-append">
				<?php echo form_input($phone1, '', 'class="col-md-2" placeholder="000"');?>
				<span class="input-group-addon">-</span>
				<?php echo form_input($phone2, '', 'class="col-md-2" placeholder="000"');?>
				<span class="input-group-addon">-</span>
				<?php echo form_input($phone3, '', 'class="col-md-3" placeholder="0000"');?>
			</div>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="password"><?=__('Password')?></label>
		<div class="controls">
			<div class="input-group input-append">
				<span class="input-group-addon"><i class="icon-lock"></i></span>
				<?php echo form_input($password, '', 'placeholder="'.__('Password').'"');?>
				<span class="input-group-addon pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-open icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-open icon-eye-close')"><i class="icon-eye-close"></i></span>
			</div>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="password_confirm"><?=__('Confirm Password')?></label>
		<div class="controls">
			<div class="input-group input-append">
				<span class="input-group-addon"><i class="icon-lock"></i></span>
				<?php echo form_input($password_confirm, '', 'placeholder="'.__('Confirm Password').'"');?>
				<span class="input-group-addon pointer" Onmousedown="$(this).prev().get(0).type='text';$('i',this).toggleClass('icon-eye-open icon-eye-close')" Onmouseup="$(this).prev().get(0).type='password';$('i',this).toggleClass('icon-eye-open icon-eye-close')"><i class="icon-eye-close"></i></span>
			</div>
		</div>
	</div>

	<div class="form-actions">
		<?php echo form_submit('submit', __('Register'), 'class="btn btn-primary btn-large"' );?>
	</div>

<?php echo form_close();?>