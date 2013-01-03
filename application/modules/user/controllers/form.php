<?php

class Form extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Vardas', 'required|trim');
		$this->form_validation->set_rules('pass', 'Slaptažodis', 'required|trim');
		$this->form_validation->set_rules('passconf', 'Slaptažodis', 'required|trim|matches[pass]');
		$this->form_validation->set_rules('email', 'Pašto dėžutė', 'required|trim|valid_email');
		$this->form_validation->set_rules('photo', 'Nuotrauka', 'required');
		$this->form_validation->set_error_delimiters('<p>', '</p>');
		
		//$this->template->add_js( array('user_module/jquery-1.8.2.min.js', 'user_module/jquery.validate.js') );
		$this->template->add_js( 'user_module/jquery.validate.js' );

		if ($this->form_validation->run() == FALSE)
		{
			//$this->template->build('user_module/myform');
			return $this->load->view('user_module/myform', false, true);
		}
		else
		{
			//$this->template->build('user_module/formsuccess');
			return $this->load->view('user_module/formsuccess', false, true );
		}
	}
}
?>