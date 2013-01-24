<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 1/3/13
 * Time: 10:41 PM
 * © 2013
 */ 
class Profile extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

	    // Check if user is logged else redirect to login page
    }

	public function index()
	{
		$this->template->build('user/profile/index_view');
	}

	public function edit()
	{
		$this->template->build('user/profile/edit_view');
		
	}
}

/* End of file welcome.php */
/* Location: ./controllers/profile.php */