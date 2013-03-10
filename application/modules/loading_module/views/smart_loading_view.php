<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by UAB "Interneto Partneris".
 * User: Vytenis
 * Date: 12.12.3
 * Time: 17.19
 * © 2012
 */
?>
<div id="#<?=$sUniqId?>" class="loading_module w-700" style="display:none">
	<div class="p-both t-c">
		<h2 class="s18"><?=$sDefaultLoadingText?></h2>
		<div class="m-both">
			<img src="<?=get_res_path('loading_module/loader.gif')?>" alt="" />
		</div>
		<?if(!empty($aMessages)):?>
			<div class="m-t" style="height: 30px">
				<ul class="messages fade">
					<li rel="0" style="display: none"><?=_('Please wait 2')?></li>
					<?php foreach( $aMessages as $sMessage => $iTimer ):?>
						<li rel="<?=$iTimer?>" style="display: none"><?=$sMessage?></li>
					<?php endforeach ?>
				</ul>
			</div>
		<?endif?>
		<div class="progress_bar"></div>
	</div>
</div>
<script type="text/javascript">

	//<![CDATA[
	window.waiting_screen = (new window.Loading()).init();

/*	function slider( $obj ) {
		var $list = $obj.children();
		$list.not(':first').hide();

		var $first_li = $list.eq(0);
		var $second_li = $list.eq(1);

		if ( !$second_li.hasClass('first') ) {

			$first_li.fadeOut('fast', function(){
				$second_li.fadeIn('fast',function(){
					window.progress.increase( ( 100 / $list.size() ), parseInt( $(this).attr( 'rel' ) ) );

					$first_li.remove().appendTo( $obj );
					setTimeout( function(){
						slider( $obj );
					}, parseInt( $second_li.attr( 'rel' ) ) );
				});

			});
		}
	}

	$(function() {
		$.fancybox({
			content: $("#loading_dialog").html(),
			scrolling: 'no',
			modal : true,
			autoSize : false,
			type: 'inline',
			beforeLoad : function() {
				this.width = 700;
				this.height = 200;
			},
			afterShow: function() {
				var item = this.inner.find('.fade');
				window.progress = new ProgBar( this.inner.find('.progress_bar') );
				window.progress
						.increase( ( 100 / item.children().size() ), parseInt( item.children(':first').attr( 'rel' ) ) )
						.onComplete(function() {
							$.fancybox.close();
						} );
				slider( item );
			}
		} );
	});*/
	//]]>
</script>
