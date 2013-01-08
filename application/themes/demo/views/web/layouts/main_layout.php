<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<?php echo $template['partials']['header']; ?>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png" />
</head>

<body>
<?php echo $template['partials']['content_header'];?>

<div class="container">
	<div class="row" data-spy="scroll" data-target=".bs-sidebar">
		<div class="span12">
			<?=$this->load->controller('breadcrumb_module/breadcrumb_module/index');?>
		</div>
	</div>
	<div class="row">
		<div class="span3 sidebar-nav bs-sidebar">
				<ul class="nav nav-list bs-sidenav">
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
			<!--/.well -->
		</div>
		<div class="span9">
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
		</div>
	</div>
</div>

<?php echo $template['partials']['footer'];?>

</body>

</html>