<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 2014-06-27
 * Time: 20:30
 * © 2014
 */
class Language_model extends MY_Model
{
	protected $_table = 'language';
	protected $primary_key = 'language_id';

	function __construct()
     {
         // Call the Model constructor
         parent::__construct();
     }

	/**
	 * @return array
	 */
	public function languages( )
	{
		$aReturn = [];
		$oResults = $this->get_all();
		if ( !empty( $oResults ) ) {
			foreach( $oResults as $oValue ) {
				$aReturn[$oValue->language_code] = $oValue->language_title;
			}
		}
		return $aReturn;
	}

}

/* End of file welcome.php */
/* Location: ./models/language_model.php */