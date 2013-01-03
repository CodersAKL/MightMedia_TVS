<?php
/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property MY_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property MY_Lang $lang
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property MY_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackback
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * @property CI_Javascript $javascript
 * @property CI_Jquery $jquery
 * @property CI_Utf8 $utf8
 * @property CI_Security $security
 * @property CI_Migration $migration
 * @property ion_auth $ion_auth
 */

class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if ( !empty( $this->input ) && !$this->input->is_ajax_request() ) {

			$this->output->enable_profiler( true );
		}
	}
	
	protected function ifAjaxCall($sMethod, array $aOptions = null) {
		if ($this->isAjax()) {
			if (!empty($aOptions['Content-Type'])) {
				switch ($aOptions['Content-Type']) {
					case 'text/html':
						header('Content-Type: text/html');
						break;
					case 'text/plain':
						header('Content-Type: text/plain');
						break;
					default: 
						header('Content-Type: application/json');
						break;
				}
			}
			
			$aData = !empty($aOptions['aData']) ? (array) $aOptions['aData'] : array();
			
			if ($sMethod instanceof Closure) {
				$sMethod($aData, $this);
			}
			
			if (method_exists($this, $sMethod)) {
				$this->{$sMethod}($aData);
			}
			
			return true;
		}
		
		return false;
	}
	
	protected function isAjax() {
		return $this->input->is_ajax_request();
	}
}
