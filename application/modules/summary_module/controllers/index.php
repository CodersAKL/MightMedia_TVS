<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function checkout($sId = "")
	{
		$aData = array();
		$this->load->model('summary_module/Flight_model');
		
		if(!empty($sId)) {
			Model_Order::getInstance()->bootstrap($sId);
			$this->Flight_model->setFlightOrder(Model_Order::getOrderCodes());
			$aData['aFlightData'] = $this->Flight_model->getModifiedFlightOrder();
		}
		else {
			die;
		}
		
		$this->load->view('summary_module/main', $aData);
		
		// BTSB2RP H3MP8RA B7U34K7
	}
}