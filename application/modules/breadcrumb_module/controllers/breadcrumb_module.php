<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 1/5/13
 * Time: 10:46 PM
 * © 2013
 */ 
class breadcrumb_module extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

	public function index()
	{

		// Get path array
		$aBread = $this->uri->segment_array();

		// Skip first element (language)
		array_shift( $aBread );

		$aData = array(
			'aBreads' => $aBread
		);

		// Print
		if ( sizeof( $aBread ) > 0 ) {
			return $this->template->view( 'breadcrumb_module/breadcrumb_view', $aData );
		}
	}
}

/* End of file welcome.php */
/* Location: ./controllers/index.php */