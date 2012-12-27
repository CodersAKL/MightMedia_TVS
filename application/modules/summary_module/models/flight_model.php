<?php if ( !defined( 'BASEPATH' ) ) { exit( 'No direct script access allowed' ); }

class Flight_model extends CI_Model
{

	private $aModifiedFlightOrder = array();

	function __construct()
	{
		parent::__construct();
	}
	
	public function setFlightOrder( $aFlightArray ) 
	{
		$iSectorId = NULL;
		$iTransferTime = NULL;
		$iOrderId = NULL;
		$iFlightTime = NULL;
		$aSectorData = array();
	
		foreach($aFlightArray as $sCode) {
		
			$oAir = Model_Order::order($sCode)->air();
			$aKeys = $oAir->getKeys();
			
			foreach($aKeys as $iKey) {
			
				$aCodeNames = null;
				
				foreach($oAir->item($iKey)->get('aSegments') as $aSegment)
				{
					if ($aSegment['iSectorNr'] == $iSectorId && $aSegment['iOrderAirId'] == $iOrderId) {
						$iFlightTime += strtotime($aSegment['sDepartureTime']) - strtotime($iTransferTime) + $aSegment['iDuration'] * 60;
						$aSectorData[] = array('iId' => $aSegment['iSectorNr'], 'iTotalDurationTime' => $iFlightTime, 'iOrderAirId' => $aSegment['iOrderAirId']);
					}
					else {
						$iFlightTime = $aSegment['iDuration'] * 60;
					}
					$iOrderId = $aSegment['iOrderAirId'];
					$iTransferTime = $aSegment['sArrivalTime'];
					$iSectorId = $aSegment['iSectorNr'];
					
					$aCodeNames[] = array(
										'sDepartureAirportName' => $this->getAirportName($aSegment['sDepartureAirportIata']),
										'sArrivalAirportName' => $this->getAirportName($aSegment['sArrivalAirportIata']),
										'sDepartureCityName' => $this->getCityName($aSegment['sDepartureCityIata']),
										'sArrivalCityName' => $this->getCityName($aSegment['sArrivalCityIata']),
										'sMarketingCompanyName' => $this->getFlightCompanyName($aSegment['sMarketingCompanyCode'])
									);
					
					
				
				}
				$this->aModifiedFlightOrder[] = array('aSegments' => $oAir->item($iKey)->get('aSegments'), 'aSectors' => $aSectorData, 'aCodeNames' => $aCodeNames);
			}
		}
	}
	
	public function getAirportName($sAirportCode) {
		switch($sAirportCode) {
			case "VNO":
				return "Vilnius International Airport";
				break;
			case "STN":
				return "London Stansted Airport";
				break;
			default:
				return $sAirportCode;
				break;
		}
	}
	
	public function getCityName($sCityCode) {
		switch($sCityCode) {
			case "VNO":
				return "Vilnius";
				break;
			case "LON":
				return "London";
				break;
			default:
				return $sCityCode;
				break;
		}
	}
	
	public function getFlightCompanyName($sCompanyCode) {
		switch($sCompanyCode) {
			case "FR":
				return "Ryanair Ltd.";
				break;
			case "SU":
				return "Aeroflot";
				break;
			default:
				return $sCompanyCode;
				break;
		}
	}
	
	public function getModifiedFlightOrder() 
	{
		return $this->aModifiedFlightOrder;
	}
}

