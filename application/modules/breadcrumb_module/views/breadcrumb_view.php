<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 1/5/13
 * Time: 10:59 PM
 * © 2013
 */

/* End of file breadcrumb_view.php */
/* Location: breadcrumb_view.php */

?>

<ul class="breadcrumb">
	<li class="">
		<a href="<?=site_url()?>">Home</a>
	</li>
	<?foreach( $aBreads as $iIndex => $sBread ):?>
		<span class="divider"> / </span>
		<li class="">
			<a href="<?=site_url( implode( '/', array_slice( $aBreads, 0, $iIndex+1 ) ) )?>"><?=_( $sBread )?></a>
		</li>
	<?endforeach?>
</ul>