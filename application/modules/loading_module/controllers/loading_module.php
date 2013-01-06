<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.12.3
 * Time: 17.15
 * © 2012
 */
class Loading_module extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template
			->add_js( 'loading_module/main.js' )
			->add_css( 'loading_module/main.css' );
		$aData = array(
			'sDefaultLoadingText' => __('Please wait 2')
		);

		return $this->load->view( 'loading_module/loading_view', $aData, true );
	}
}

/* End of file loading_module.php */
/* Location: ./controllers/loading_module.php */
