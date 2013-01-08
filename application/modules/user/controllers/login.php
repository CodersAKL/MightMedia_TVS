<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * MightMedia TVS
 * User: Vytenis
 * Date: 1/3/13
 * Time: 10:46 PM
 * © 2013
 */ 
class login extends MY_Controller
{
	var $data;

    function __construct()
    {
        parent::__construct();
	    $this->load->library('ion_auth');
	    $this->load->library('session');
	    $this->load->library('form_validation');
	    $this->load->helper('url');
	    $this->load->language('user/user');
	    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    }

	public function index()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', __('Identity'), 'required');
		$this->form_validation->set_rules('password', __('Password'), 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page

				// Log the attempt
				$this->ion_auth->login_attempt( $this->input->post('identity') );
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('user/login'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array(
				'name' => 'identity',
                'id' => 'identity',
                'type' => 'email',
                'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array(
				'name' => 'password',
                'id' => 'password',
                'type' => 'password',
			);

		}
		if ( $this->config->item('identity', 'ion_auth') == 'username' ){
			$this->data['identity_label'] = __('Username');
		}
		else
		{
			$this->data['identity_label'] = __('Email');
		}

		if ( $this->input->is_ajax_request()) {
			$this->load->view('user/login', $this->data);
		} else {
			$this->template
			->set_layout( 'full_width_layout' )
			->build( 'user/login_big', $this->data );
		}
	}

	public function small()
	{
		$this->data['title'] = "Login";

		//validate form input
		$this->form_validation->set_rules('identity', __('Identity'), 'required');
		$this->form_validation->set_rules('password', __('Password'), 'required');

		if ($this->form_validation->run() == true)
		{
			//check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/');
			}
			else
			{
				//if the login was un-successful
				//redirect them back to the login page

				// Log the attempt
				$this->ion_auth->login_attempt( $this->input->post('identity') );
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('user/login'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array(
				'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array(
				'name' => 'password',
                'id' => 'password',
                'type' => 'password',
			);

		}

		if ( $this->config->item('identity', 'ion_auth') == 'username' ){
			$this->data['identity_label'] = __('Username');
		}
		else
		{
			$this->data['identity_label'] = __('Email');
		}

		$this->template->append_css('user:css/main.css');
		echo $this->template->view('user/login', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./controllers/login.php */