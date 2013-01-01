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
					<li class="dropdown">
						<a class="dropdown-toggle" href="/users/sign_up" data-toggle="dropdown">
							<img src="http://dev/vytenis/wl/resources/images/flags/small/gb.png"/>
							<strong class="caret"></strong>
						</a>
						<ul class="dropdown-menu">
							<!-- dropdown language links -->
							<li>
								<a href="#"><img src="http://dev/vytenis/wl/resources/images/flags/small/lt.png" alt="lt"/>
									Lietuviškai</a></li>
							<li>
								<a href="#"><img src="http://dev/vytenis/wl/resources/images/flags/small/ru.png" alt="ru"/>
									По-русски</a></li>
							<li>
								<a href="#"><img src="http://dev/vytenis/wl/resources/images/flags/small/pl.png" alt="pl"/>
									Po polsku</a></li>
							<li>
								<a href="#"><img src="http://dev/vytenis/wl/resources/images/flags/small/ua.png" alt="ua"/>
									По-українськи</a></li>
							<li class="divider"></li>
							<li><a href="#">Translate to your language</a></li>
						</ul>
					</li>
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Savitarna<strong class="caret"></strong></a>

						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							<!-- Login form here -->
							<form action="[YOUR ACTION]" method="post" accept-charset="UTF-8">
								<input id="user_username" style="margin-bottom: 15px;" type="text" name="user[orderCode]" size="30" placeholder="Order Code"/>
								<input id="user_password" style="margin-bottom: 15px;" type="email" name="user[email]" size="30" placeholder="Your eMail"/>

								<input class="btn btn-block btn-primary" type="submit" name="commit" value="Log In"/>
							</form>
						</div>
					</li>
				</ul>

			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
