<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 1/3/13
 * Time: 11:53 PM
 * © 2013
 */
?>
<h3>Why us?</h3>
<p>
	Some text about us and why us....
	<div>
	<?=anchor('user/login',_('Login'))?>
	<?=_('or')?>
	<?=anchor('user/register',_('Register'))?>
	</div>
</p>