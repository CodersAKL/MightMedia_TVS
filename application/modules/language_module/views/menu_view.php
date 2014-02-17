<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 12.11.8
 * Time: 14.21
 * © 2012
 */
?>

<li class="dropdown">
	<a class="dropdown-toggle" href="<?=current_url()?>" data-toggle="dropdown">
		<img src="<?=spacer()?>" alt="lt" class="flags <?=LANG?>""/>
		<?=__( 'In_'.strtoupper( LANG ) )?>
		<strong class="caret"></strong>
	</a>


	<ul class="dropdown-menu">
		<!-- dropdown language links -->
		<?foreach($languages as $sLang => $sLanguage):?>
			<?if( $sLang != LANG ):?>
				<li>
					<a href="<?=site_url( $this->lang->switch_uri( $sLang ) );?>" title="<?=__( 'In_'.strtoupper( $sLang ) )?>">
						<img src="<?=spacer()?>" alt="lt" class="flags <?=$sLang?>"/>
						<?=__( 'In_'.strtoupper( $sLang ) )?>
					</a>
				</li>
			<?endif?>
		<?endforeach?>
		<li class="divider"></li>
		<li><a href="#">Translate to your language</a></li>
	</ul>
</li>
