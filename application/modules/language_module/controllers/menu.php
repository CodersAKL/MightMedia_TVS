<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: Vytenis
 * Date: 12.11.8
 * Time: 14.07
 * © 2012
 * 
 * @property template $template
 */
class Menu extends MY_Controller
{

	public function index()
	{
		/*if ( ! $aData = $this->cache->get( 'aLanguages_' . APPPATH ) ) {
		
			$this->db->select('lang');
			$this->db->where('agency_id', APPPATH);
			$this->db->order_by('position');
			$aData['languages'] = $this->db->get('agency_language')->result_array();

			$this->cache->save('aLanguages_' . APPPATH, $aData, 60*60*24 );
		}*/
		$aData['languages'] = $this->config->item('locales');
		$this->load->language( 'language_module/language' );

		return $this->template->view( 'language_module/menu_view', $aData );
	}
	
}

/* End of file menu.php */
/* Location: ./controllers/menu.php */
