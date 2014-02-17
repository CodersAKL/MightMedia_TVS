<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
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

function spacer() {
	return "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7";
}

/**
 * Return path to the original file (parent) without file extension
 * @param null $sFile
 * @return string
 */
function get_view_path( $sFile = null ) {
	if ( empty( $sFile ) ) {
		// Get parent file path
		$backtrace = debug_backtrace(
			defined("DEBUG_BACKTRACE_IGNORE_ARGS")
				? DEBUG_BACKTRACE_IGNORE_ARGS
				: false);
		$top_frame = array_shift($backtrace);
		$sFile = $top_frame['file'];
	}
	if ( ENVIRONMENT == 'development' ) {
		return '<!-- '. ucwords( str_replace('/', ' ', substr( $sFile, strlen( APPPATH ), -4 ) ) ) .' -->';
	} else {
		return '';
	}
}

/**
 * Start inline javascript compressing in a view file
 */
function jsCompressStart() {
	ob_start();
}

/**
 * Finish the javascript compression in a view file
 */
function jsCompessEnd() {
	$sScript = ob_get_contents();
	ob_end_clean();
	$sScript = preg_replace('/([ ]+)/', ' ', $sScript);
	$sScript = str_replace(array("\n", "\r", "\t"), '', $sScript);
	$sScript = preg_replace("/\s*([\{\[\]\}\(\)\|&;]+)\s*/", "$1", $sScript);
	print $sScript;
}

function toStringDate($iDateTime) {
	// days/hours/minutes
	if ($iDateTime >= 86400) {
		return
			((int) date('d', $iDateTime)) . 'd ' .
			((int) date('h', $iDateTime)) . 'h ' .
			((int) date('i', $iDateTime)) . 'm';
	}
	// hours/minutes
	else if ($iDateTime >= 3600) {
		return
			((int) date('h', $iDateTime)) . 'h ' .
			((int) date('i', $iDateTime)) . 'm';
	}
	// minutes
	else {
		return ((int) date('i', $iDateTime)) . 'm';
	}
}
