<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.11.8
 * Time: 13.45
 * © 2012
 */
?>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?=base_url()?>" id="brand_logo"><?=$this->config->item('site_name');?></a>

			<div class="nav-collapse collapse">

				<ul class="nav">
					<li<?if($this->uri->segment(2) == 'user'):?> class="active"<?endif?>><a href="<?=site_url('user')?>"><?=__('Why us?')?></a></li>
					<li<?if($this->uri->segment(2) == 'blog'):?> class="active"<?endif?>><a href="<?=site_url('blog')?>"><?=__('Blog')?></a></li>
				</ul>

				<!-- The drop down menu -->
				<ul class="nav pull-right">

					<?=$this->load->controller('language_module/menu/index')?>

					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown"><?=__('Login')?><strong class="caret"></strong></a>

						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<!-- Login form here -->
							<?=$this->load->controller('user/login/small');?>

						</div>
					</li>
				</ul>

			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
