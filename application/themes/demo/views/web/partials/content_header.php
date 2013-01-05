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
			<a class="brand" href="#" id="brand_logo">WebStrip</a>

			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="active"><a href="#">Why us?</a></li>
					<li><a href="#about">About us</a></li>
					<li><a href="#contact">What people say about us</a></li>
					<li><a href="#contact">Contact us</a></li>
					<li><a href="#contact">Help us</a></li>
				</ul>

				<form class="navbar-search pull-left">
					<input type="text" class="search-query" placeholder="Search">
				</form>

				<!-- The drop down menu -->
				<ul class="nav pull-right">
						<?=$this->load->controller('language_module/menu/index')?>

					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Savitarna<strong class="caret"></strong></a>

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
