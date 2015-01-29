<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: trash
 * Date: 29/01/2015
 * Time: 14:53
 * © 2015
 */ 
class MY_Router extends CI_Router
{
    function __construct()
    {
        parent::__construct();
    }

    public function fetch_module( $sPath = null ) {
        if ( empty( $sPath ) ) {
            $sPath = $this->fetch_path();
        }
        preg_match('/(\w*)_module/', $sPath, $aMatches);
        return !empty($aMatches[0]) ? $aMatches[0] : null;
    }
}

/* End of file welcome.php */
/* Location: ./controllers/MY_Router.php */