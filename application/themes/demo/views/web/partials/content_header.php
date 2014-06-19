<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 12.11.8
 * Time: 13.45
 * © 2012
 */
?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-inner">
		<div class="container">
			<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="navbar-brand" href="<?=base_url()?>" id="brand_logo"><?=$this->config->item('site_name');?></a>

			<div class="navbar-collapse collapse">

				<ul class="nav navbar-nav">
					<li<?if($this->uri->segment(2) == 'user'):?> class="active"<?endif?>><a href="<?=site_url('user')?>"><?=__('Why us?')?></a></li>
					<li<?if($this->uri->segment(2) == 'blog'):?> class="active"<?endif?>><a href="<?=site_url('blog')?>"><?=__('Blog')?></a></li>
				</ul>

				<!-- The drop down menu -->
				<ul class="nav navbar-nav navbar-right">

					<?=$this->load->controller('language_module/menu/index')?>

					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=__('Login')?><strong class="caret"></strong></a>

						<div class="dropdown-menu" style="">
							<!-- Login form here -->
							<?=$this->load->controller('user/login/small');?>

						</div>
					</li>
				</ul>

			</div>
			<!--/.navbar-collapse -->
		</div>
	</div>
</div>
