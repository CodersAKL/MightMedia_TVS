<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by Coders
 * User: FDisk
 * Date: 1/1/13
 * Time: 5:34 PM
 * © 2013
 */
class Read extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index( $iItem )
	{
		$this->item( $iItem );
	}

	public function item( $iItem )
	{
		echo $iItem;
	}
}

/* End of file welcome.php */
/* Location: ./controllers/read.php */
