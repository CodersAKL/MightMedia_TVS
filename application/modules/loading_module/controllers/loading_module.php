<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by "Coders".
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
		$this->load->config( '../modules/loading_module/config/messages' );
		$this->template
			->set_layout('userspace_layout')
			->add_js( 'loading_module/progress_bar.js' )
			->add_js( 'loading_module/loading.js' )
			->add_css( 'loading_module/main.css' );
	}

	public function index()
	{
		$aData = array(
			'sDefaultLoadingText' => _('Please wait 2')
		);

		/* Loading data */

		//$this->template->build( 'loading_module/smart_loading_view' );
	}

	public function mc()
	{
		$aData['aMessages'] = $this->config->item('mc', 'loading_messages');
		$aData['sUniqId'] = 'loading_module_'.uniqid();
		return $this->template->view( 'loading_module/smart_loading_view', $aData );
	}

	public function payment()
	{
		$aData['aMessages'] = $this->config->item('payment', 'loading_messages');
		$aData['sUniqId'] = 'loading_module_'.uniqid();
		return $this->template->view( 'loading_module/smart_loading_view', $aData );
	}
}

/* End of file loading_module.php */
/* Location: ./controllers/loading_module.php */
