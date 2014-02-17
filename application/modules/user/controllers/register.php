<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: Vytenis
 * Date: 1/5/13
 * Time: 9:17 PM
 * © 2013
 */
class register extends MY_Controller
{
	var $data;

    function __construct()
    {
        parent::__construct();

	    $this->load->library('ion_auth');
	    $this->load->library('session');
	    $this->load->library('form_validation');
	    $this->load->helper('url');
	    $this->lang->load('user/user');

	    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

    }

	public function index()
	{
		$this->data['title'] = "Create User";

		//if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		//{
		//	redirect('user/auth');
		//}

		//validate form input
		$this->form_validation->set_rules('first_name', __('First Name'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', __('Last Name'), 'required|xss_clean');
		$this->form_validation->set_rules('email', __('Email Address'), 'required|valid_email');
		$this->form_validation->set_rules('phone1', __('First Part of Phone'), 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone2', __('Second Part of Phone'), 'required|xss_clean|min_length[3]|max_length[3]');
		$this->form_validation->set_rules('phone3', __('Third Part of Phone'), 'required|xss_clean|min_length[4]|max_length[5]');
		$this->form_validation->set_rules('company', __('Company Name'), 'required|xss_clean');
		$this->form_validation->set_rules('password', __('Password'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', __('Password Confirmation'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone1') . '-' . $this->input->post('phone2') . '-' . $this->input->post('phone3'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('user/login');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'email',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone1'] = array(
				'name'  => 'phone1',
				'id'    => 'phone1',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone1'),
				'maxlength' => '3'
			);
			$this->data['phone2'] = array(
				'name'  => 'phone2',
				'id'    => 'phone2',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone2'),
				'maxlength'   => '3'
			);
			$this->data['phone3'] = array(
				'name'  => 'phone3',
				'id'    => 'phone3',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone3'),
				'maxlength' => '5'
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->template
				->set_layout( 'full_width_layout' )
				->build( 'user/register_view', $this->data );
		}

	}
}

/* End of file welcome.php */
/* Location: ./controllers/register.php */
