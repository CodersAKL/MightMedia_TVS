<div id="login_form_wrap">

	<?php echo $message;?>
	<?php echo form_open("user/login",'id="login_form"');?>
		<div class="input-prepend">
			<span class="add-on">@</span>
			<?php echo form_input($identity,'','placeholder="'.$identity_label.'"');?>
		</div>
		<div class="input-prepend">
			<span class="add-on">
				<i class="icon-lock"></i>
			</span>
			<?php echo form_input($password, '', 'placeholder="'.__('user_password').'"');?>
		</div>
		<label class="checkbox">
			<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
			<?=__('Remember Me')?>
		</label>
		<?php echo form_submit('submit', __('user_login'), 'class="btn btn-block btn-primary"');?>

		<?php echo anchor('user/forgot_password', __('Forgot your password?')) ;?>
	<?php echo form_close();?>

	<script type="text/javascript">
		$(function(){
			$( '#login_form' ).submit(function(){
				var
					url = $( this ).attr('action' ),
					data = $( this ).serialize(),
					method = $( this ).attr('method')
				;
				$.ajax({
					url : url,
					type: method,
					data : data
				} ).done( function( data ) {
					$('#login_form_wrap' ).html( data );
				} );
				return false;
			});
		});
	</script>
</div>
