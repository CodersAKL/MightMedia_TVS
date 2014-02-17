<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 12.10.25
 * Time: 13.34
 * © 2012
 */
class User_model extends CI_Model
{
	private $sUserName = NULL;

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function setUserName( $sUserName )
	{
		$this->sUserName = $sUserName;
	}

	public function getUserName()
	{
		return $this->sUserName;
	}
}

/* End of file welcome.php */
/* Location: ./models/users.php */
