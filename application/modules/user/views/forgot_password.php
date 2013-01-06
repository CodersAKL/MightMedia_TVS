<h3><?=_('Forgot Password')?></h3>
<p>Please enter your <?php echo $identity_label; ?> so we can send you an email to reset your password.</p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(), 'class="form-horizontal"');?>

<div class="control-group">
	<label class="control-label" for="email"><?=_('Email Address')?></label>
	<div class="controls">
		<div class="input-prepend">
			<span class="add-on"><i class="icon-envelope"></i></span>
			<?php echo form_input($email, '', 'placeholder="'._('Email Address').'" class=""');?>
		</div>
	</div>
</div>

<div class="form-actions">
	<?php echo form_submit('submit', _('Submit'), 'class="btn btn-primary btn-large"');?>
</div>
      
<?php echo form_close();?>