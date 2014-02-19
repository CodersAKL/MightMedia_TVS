<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 1/6/13
 * Time: 12:29 AM
 * © 2013
 */
class logout extends MY_Controller
{
	var $data;
    function __construct()
    {
        parent::__construct();
	    $this->load->library('ion_auth');
	    $this->load->driver('session');
	    $this->load->library('form_validation');
	    $this->load->helper('url');

	    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    }
	function index()
	{
		$this->data['title'] = "Logout";

		//log the user out
		$logout = $this->ion_auth->logout();

		//redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('auth/login', 'refresh');
	}

}

/* End of file logout.php */
/* Location: ./controllers/logout.php */
