<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.11.8
 * Time: 14.21
 * © 2012
 */
?>
<div class="o-h m-b10">
	<ul>
		<?foreach($languages as $sLang => $sLanguage):?>
		<li class="f-r m-l sb_languages_list_item_current">
			<a href="<?=site_url( $this->lang->switch_uri( $sLang ) );?>" title="<?=lang( 'In_'.strtoupper( $sLang ) )?>" class="<?if( $sLang == LANG ):?>no-dec<?endif?>">
				<img src="<?=get_res_path()?>img/layout/spacer.png" alt="<?=$sLang?>" class="flags <?=$sLang?> m-r5 v-m" /><span><?=$sLanguage?></span>
			</a>
		</li>
		<?endforeach?>
	</ul>
</div>