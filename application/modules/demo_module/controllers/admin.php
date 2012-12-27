<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: FDisk
 * Date: 12/27/12
 * Time: 10:49 PM
 * © 2012
 */
class Admin extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		echo 'Admin of demo module';
	}

	public function add()
	{
		echo 'ad item';
	}
}

/* End of file welcome.php */
/* Location: ./controllers/admin.php */