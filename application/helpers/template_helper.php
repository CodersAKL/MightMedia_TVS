<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.10.30
 * Time: 11.35
 * © 2012
 */

/**
 * Echo the css file include html string
 * @param string $mFile
 * @return void
 */
function add_css( $mFile = '' ) {
	
	$CI =& get_instance();

	if ( !empty( $mFile ) ) {
		$CI->template->add_css( $mFile, TRUE );
	}
}

/**
 * Echo the js file include html string
 * @param string $mFile
 * @return void
 */
function add_js( $mFile = '' ) {
	
	$CI =& get_instance();

	if ( !empty( $mFile ) ) {
		$CI->template->add_js( $mFile, TRUE );
	}
}

/**
 * Returns full path to the current theme resource directory
 * @param null $sFile
 * @return string
 */
function get_res_path( $sFile = NULL ) {
	
	$CI =& get_instance();

	return base_url().$CI->template->find_resource_file( $sFile );
}
