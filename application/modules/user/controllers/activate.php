<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 13.2.13
 * Time: 21.28
 * © 2013
 */ 
class activate extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
	    $this->load->library('ion_auth');
    }

	function index($id, $code=false)
	{

		error_reporting(E_ALL);
		ini_set('display_errors', 'on');

		if ($code !== false)
		{
			$activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}
		dbx( $id, $code, $activation, true );

		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect("user");
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("user/forgot_password");
		}
	}
}

/* End of file activate.php */
/* Location: ./controllers/activate.php */