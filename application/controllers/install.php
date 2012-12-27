<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by MightMedia TVS
 * User: FDisk
 * Date: 12/27/12
 * Time: 4:02 PM
 * © 2012
 *
 */
class Install extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->current())
		{
			show_error($this->migration->error_string());
		}
	}

	public function uninstall()
	{
		$this->load->library('migration');
		$this->migration->version(0);
	}
}

/* End of file welcome.php */
/* Location: ./controllers/migrate.php */