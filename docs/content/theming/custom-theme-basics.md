# Custom Theme Basics

Greitai supports themes which allow you to easily change the look and feel of your web-site. The way it works is with a master **layout** file and multiple **partials** that share presentation logic between different layouts.

## Creating a theme
Themes are stored in:
<dfn>[application]/themes/</dfn>
 
For themes available to only one specific site use the folowing direcotry structure:

<dfn>[application]/themes/[site-name].[agency-id]/</dfn>
Default theme is in <dfn>[application]/themes/default/views/[web|mobile]</dfn>

For desctop theme create direcotry **web** 
<dfn>[application]/themes/[site-name].[agency-id]/views/**web**/</dfn>

For mobile theme create direcotory **mobile**
<dfn>[application]/themes/[site-name].[agency-id]/views/**mobile**</dfn>

## Supported Folders

* layouts
* modules
* partials
* resources
* resources/css
* resources/js
* resources/img

## theme.php

Each theme has it&#39;s own core **JS** and **CSS** files like *jQuery.js* and *reset.css*. Files are located in each theme, here:

<dfn>[application]/themes/[site-name].[agency-id]/views/[web]/resources/</dfn>

or

<dfn>[application]/themes/[site-name].[agency-id]/views/[mobile]/resources/</dfn>

## Example

    class User extends CI_Controller
    {
        public function index()
        {
            $this->template
                ->title( 'Foo & Bar' )
                ->set_theme( 'default' )
                ->set_layout( 'main' )
                ->add_css( 'example.css' )
                ->add_js( 'example.js' )
                ->add_js_var( array( 'foo' => 'bar' ) )
                ->set_partial( 'header', 'partials/header' )
                ->set_partial( 'footer', 'partials/footer' )
                ->build( 'user' );
        }
    }