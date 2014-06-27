<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 12.11.8
 * Time: 14.07
 * © 2012
 *
 * @property template $template
 */
class Menu extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
//		$this->load->driver('cache', array('adapter' => 'memcached', 'backup' => 'file'));
	}

	public function index()
	{

		$this->load->model( 'language_module/language_model' );

		$aData['languages'] = $this->language_model->languages();

		$this->load->language( 'language_module/language' );
		$this->load->view( 'language_module/menu_view', $aData );
	}

}

/* End of file menu.php */
/* Location: ./controllers/menu.php */
