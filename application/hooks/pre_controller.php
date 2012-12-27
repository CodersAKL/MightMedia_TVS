<?php

function loadMemcached()
{
	$oCI = get_instance();
	// If no memcache extension is loaded - load dummy
	if ( ! extension_loaded('memcached') && ! extension_loaded('memcache')) {
		$oCI->load->driver( 'cache', array( 'adapter' => 'dummy' ) );
	} else {
		$oCI->load->driver( 'cache', array( 'adapter' => 'memcached' ) );
	}
}
