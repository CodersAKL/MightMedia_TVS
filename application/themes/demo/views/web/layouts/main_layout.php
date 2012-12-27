<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<?php echo $template['partials']['header']; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
	</script>
	<![endif]-->
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>
<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Project name</a>

			<div class="nav-collapse">
				<ul class="nav">
					<li>
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#">About</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<ul class="breadcrumb">
	<li class="">
		<a href="#">Playlists</a>
	</li>
      <span class="divider"> / </span>
	<li class="">
		<a href="#">Office</a>
	</li>
      <span class="divider"> / </span>
	<li class="">
		<a href="#">Rick Astley</a>
	</li>
</ul>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<div class="sidebar-nav">
				<ul class="nav nav-tabs nav-stacked">
					<li class="nav-header">Frontend</li>
					<li class="active"><a href="#">HTML 4.01</a></li>
					<li><a href="#">HTML5</a></li>
					<li><a href="#">CSS</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Twitter Bootstrap</a></li>
					<li><a href="#">Firebug</a></li>
					<li class="nav-header">Backend</li>
					<li><a href="#">PHP</a></li>
					<li><a href="#">SQL</a></li>
					<li><a href="#">MySQL</a></li>
					<li><a href="#">PostgreSQL</a></li>
					<li><a href="#">MongoDB</a></li>
				</ul>
			</div>
			<!--/.well -->
		</div>
		<div class="span10">
			<h3>Page Title</h3>

			<div class="row-fluid">
				<?php echo $template['body']; ?>
			</div>
			<div class="row-fluid">
				<h3>Most recent</h3>

				<div class="span4">
					<div>
						<h2>Heading</h2>

						<p>
							Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus
							ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
							sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed
							odio dui.
						</p>
					</div>
					<a class="btn" href="#">View details »</a>
				</div>
				<div class="span4">
					<div>
						<h2>Heading</h2>

						<p>
							Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus
							ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
							sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed
							odio dui.
						</p>
					</div>
					<a class="btn" href="#">View details »</a>
				</div>
			</div>
			<hr>
		</div>
	</div>
</div>
<div class="navbar navbar-fixed-bottom">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">Brand</a>
			<ul class="nav">
				<li>
					<a href="#">Link 1</a>
				</li>
				<li>
					<a href="#">Link 2</a>
				</li>
				<li>
					<a href="#">Link 3</a>
				</li>
			</ul>
		</div>
	</div>
</div>
</body>

</html>