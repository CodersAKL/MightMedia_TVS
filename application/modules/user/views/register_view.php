<h1><?=_('Create User')?></h1>
<p><?=_('Please enter the users information below.')?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?=_('First Name')?>: <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
	      <?=_('Last Name')?>: <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
	      <?=_('Company Name')?>: <br />
            <?php echo form_input($company);?>
      </p>

      <p>
	      <?=_('Email')?>: <br />
            <?php echo form_input($email);?>
      </p>

      <p>
	      <?=_('Phone')?>: <br />
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
      </p>

      <p>
	      <?=_('Password')?>: <br />
            <?php echo form_input($password);?>
      </p>

      <p>
	      <?=_('Confirm Password')?>: <br />
            <?php echo form_input($password_confirm);?>
      </p>


      <p><?php echo form_submit('submit', 'Create User');?></p>

<?php echo form_close();?>