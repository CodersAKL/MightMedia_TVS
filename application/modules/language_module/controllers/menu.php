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

		$this->template->add_css('language_module/main.css');
		if ( ! $aData = $this->cache->get( 'aLanguages_' . ENVIRONMENT ) ) {
//			$this->db->cache_on();
			$aResults = $this->db
				->select('language_code as code, language_title as title')
				->order_by('language_position')
				->get('language')->result_array();
//			$this->db->cache_off();

			foreach( $aResults as $aValue ) {
				$aData['languages'][$aValue['code']] = $aValue['title'];
			}

			$this->cache->save('aLanguages_' . ENVIRONMENT, $aData, 60*60*24 );
		}
		$this->load->language( 'language_module/language' );

		$this->load->view( 'language_module/menu_view', $aData );
	}

}

/* End of file menu.php */
/* Location: ./controllers/menu.php */
