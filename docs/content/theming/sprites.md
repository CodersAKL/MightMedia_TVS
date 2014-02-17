# Theme Sprites

All theme pictures must be in PNG format. Keep in mind that all file names will be as class name in CSS sprites
Roles for naming:

* Do not start a name with a number
* Do not use spaces in file name instead use a "-" symbol
* File names must be unique for all project.
* Use full names if image is used in module ex.: user-module-edit.png witch is placed in

<dfn>modules/user_module/views/resources/img/</dfn>

## How to use sprites in SCSS
> Here, &lt;mask&gt; is the name of our image folder

To generate all sprite images class use this syntax:

	$<mask>-sprite-dimensions:true;
	$<mask>-sprite-base-class: ".sprite";
	@import "<mask>/**/*.png";

	@include all-<mask>-sprites;

To generate just some of them

	$<mask>-sprite-dimensions:true;
	$<mask>-sprite-base-class: ".sprite";
	@import "<mask>/**/*.png";

	@each $file in logo, button-edit {
		.icons.flag.#{$file} {
			@include <mask>-sprite($file);
		}
	}


To use just an sprite element in a class

	$<mask>-sprite-dimensions:true;
	@import "<mask>/**/*.png";

	.header-logo {
		@include <mask>-sprite("logo");
	}
