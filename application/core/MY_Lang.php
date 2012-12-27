<?php  if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

class MY_Lang extends CI_Lang
{

	/**************************************************
	configuration
	 ***************************************************/

	// languages
	var $languages = array();

	// special URIs (not localized)
	var $special = array(
			"resources",
			"application/themes"
		);
	
	// CodeIgniter object
	var $ci;

	// where to redirect if no language in URI
	var $default_uri = '';

	/**************************************************/


	function __construct()
	{
		parent::__construct();
		$this->ci =& get_instance();

		$this->languages = $this->ci->config->item( 'locales' );

		$segment = $this->ci->uri->segment( 1 );
		if ( isset( $this->languages[$segment] ) ) // URI with language -> ok
		{
			$language = $this->languages[$segment];
			define( 'LANG', $segment );
		}
		else if ( $this->is_special( $segment ) ) // special URI -> no redirect
		{

			return;
		}
		else // URI without language -> redirect to default_uri
		{
						// set default language
			$sDefaultLang = $this->default_lang();
			define( 'LANG', $sDefaultLang );

			// redirect with a language string in the current url
			header("Location: " . $this->ci->config->site_url( $this->localized( $this->ci->uri->uri_string() ) ), TRUE, 302 );
		}
	}

	// get current language
	// ex: return 'en' if language in CI config is 'english' 
	function lang()
	{
		$language = LANG;

		if ( isset( $this->languages[$language] ) ) {
			
			return $language;
		}
		
		return null; // this should not happen
	}

	function is_special( $uri )
	{
		$exploded = explode( '/', $uri );
		
		if ( in_array( $exploded[0], $this->special ) ) {
			return true;
		}
		
		if ( isset( $this->languages[$uri] ) ) {
			
			return true;
		}

		return false;
	}

	function switch_uri( $lang )
	{
		$uri = $this->ci->uri->uri_string();
		
		if ( $uri != "" ) {
			$exploded = explode( '/', $uri );
			
			// If the current url has no language string add to the beginning of uri
			if ( $exploded[0] != $this->has_language( $exploded[0] ) && $this->has_language( $lang ) ) {
				array_unshift($exploded, $lang );
			} else {
				$exploded[0] = $lang;
			}
			$uri = implode( '/', $exploded );
		}

		return $uri;
	}

	// is there a language segment in this $uri?
	function has_language( $uri )
	{
		$first_segment = null;

		$exploded = explode( '/', $uri );
		
		return isset( $this->languages[$exploded[0]] );
	}

	// default language: first element of $this->languages
	function default_lang()
	{
		foreach ( $this->languages as $lang => $language ) {
			
			return $lang;
		}
	}

	// add language segment to $uri (if appropriate)
	function localized( $uri )
	{
		if ( $this->has_language( $uri )
			|| $this->is_special( $uri )
			|| preg_match( '/(.+)\.[a-zA-Z0-9]{2,4}$/', $uri )
		) {
			// we don't need a language segment because:
			// - there's already one or
			// - it's a special uri (set in $special) or
			// - that's a link to a file
		}
		else {
			$uri = $this->lang().'/'.$uri;
		}

		return $uri;
	}

}

/* End of file */
