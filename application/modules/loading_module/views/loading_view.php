<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.12.3
 * Time: 17.19
 * © 2012
 */
?>
<div id="loading_dialog" class="d-n w-700">
	<div class="p-both">
		<table class="w100p">
			<tr>
				<td class="v-t b-r b-sol">
					<img src="<?=get_res_path('loading_module/loading.gif')?>" alt="" class="f-l m-r m-b v-m" />
					<span class="c-r s16 t-b message"><?=$sDefaultLoadingText?></span>
				</td>
				<td class="w1p t-r">
					<img src="<?=get_res_path('loading_module/Mondis_WS.png')?>" alt="" />
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript">
	//<![CDATA[
	$(function() {
		$("#loading_dialog" ).fancybox ({
			content: $("#loading_dialog").html(),
			scrolling: 'no',
			modal : true,
			autoSize : false,
			beforeLoad : function() {
				$(this).removeClass('d-n');
				this.width = 700;
				this.height = 280;
			}
		});
		/*$("body").ajaxStart(function(){
			$("#loading_dialog" ).trigger( 'click' );
		});
		$("body").ajaxStop(function(){
			$.fancybox.close( true )
		});
		$("body").ajaxError(function(event, request, settings){
			$("#loading_dialog .message" ).text("Error requesting page " + settings.url);
		});*/
	});
	//]]>
</script>
