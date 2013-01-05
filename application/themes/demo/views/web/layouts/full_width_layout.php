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
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<div class="row-fluid">
				<?php echo $template['body']; ?>
			</div>
		</div>
	</div>
</div>

<?php echo $template['partials']['footer'];?>

</body>

</html>