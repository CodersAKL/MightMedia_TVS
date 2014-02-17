<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: FDisk
 * Date: 12/27/12
 * Time: 10:45 PM
 * © 2012
 */
class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		echo 'Login';
	}

	public function logout()
	{
		echo 'Logout';
	}
}

/* End of file welcome.php */
/* Location: ./controllers/admin.php */
