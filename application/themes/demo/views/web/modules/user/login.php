<div id="login_form_wrap" class="container-fluid" style="width:280px">

	<div class="row">
		<div class="col-xs-12">
			<?php echo $message;?>
		</div>
	</div>
		<?php echo form_open("user/login",'id="login_form"');?>

			<div class="input-group">
				<span class="input-group-addon">@</span>
				<?php echo form_input($identity,'','placeholder="'.$identity_label.'" class="form-control"');?>
			</div>
			<div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-lock"></i>
				</span>
				<?php echo form_input($password, '', 'placeholder="'.__('user_password').'" class="form-control"');?>
			</div>
			<label class="checkbox">
				<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
				<?=__('Remember Me')?>
			</label>
			<?php echo form_submit('submit', __('user_login'), 'class="btn btn-block btn-primary"');?>

			<?php echo anchor('user/forgot_password', __('Forgot your password?')) ;?>

		<?php echo form_close();?>

	</div>

</div>
