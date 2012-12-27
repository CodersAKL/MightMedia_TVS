Controller add CSS
----
In Controller You can add an CSS file or an inline CSS

	$css = '* { color: red; }';

	$this
		->template
		->title('Hello world')
		->add_css('demo_module/main.css')
		->inline_css($css)
		->build('demo_view')
	;

Controller add JS
----
In Controller You can add an JS file or an inline javascript

	$js = 'alert(69);';

	$this
		->template
		->title('Hello world')
		->add_js('demo_module/main.js')
		->inline_js($js)
		->build('demo_view')
	;

----
> All inline css and js are merged in one tag and placed in to the head.

----
## Helpers for css and js used in views ##

	<?add_css('some_file.css');?>
	<?add_js('some_file.js');?>

This will print lines

	<link rel="stylesheet" href="http://dev/**/application/themes/default/views/web/resources/css/some_file.css" type="text/css" media="all" />
	<script src="http://dev/**/application/themes/default/views/web/resources/js/some_file.js" type="text/javascript" ></script>

Return full path to the curent theme resource direcotry use `<?=get_res_path()?>`

	<img alt="Greitai.lt" src="<?=get_res_path()?>img/layout/logo.gif" />

Result is

	<img alt="Greitai.lt" src="http://dev/**/application/themes/default/views/web/resources/img/layout/logo.gif" />

> Using this method No CSS and JS are compiled or combined