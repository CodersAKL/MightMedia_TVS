<!DOCTYPE html>
<head>
	<title></title>
	
	<link href='http://dev/roman/git/application/modules/summary/views/resources/css/flight.css' rel='stylesheet' type='text/css' media='all'/>
	
</head>
<body>

<div id="container">

<?php
	
	$iSectorId = NULL;
	$iTransferTime = NULL;
	$iOrderId = NULL;
	$iDays = NULL;
	
if(!empty($aFlightData)) {
	foreach($aFlightData as $aFlightDataBlock) {
		foreach($aFlightDataBlock['aSegments'] as $aSegmentKey => $aSegmentData) {
		
			if ($aSegmentData['iSectorNr'] == $iSectorId && $aSegmentData['iOrderAirId'] == $iOrderId) {
				echo "<div id=\"grey\">Persėdimo laikas: " . date('H v\a\l. i \m\i\n.', (strtotime($aSegmentData['sDepartureTime']) - strtotime($iTransferTime)))  . "</div>";
			}
			else {
				if(!empty($aFlightDataBlock['aSectors'])) {
					foreach($aFlightDataBlock['aSectors'] as $aSector) {
						if($aSector['iId'] == $aSegmentData['iSectorNr']) {
						
							$iDays = date('j', $aSector['iTotalDurationTime']) > 1 ? date('j', $aSector['iTotalDurationTime']) - 1 . "d. " : "";
							echo "<div id=\"yellow\">" . date('Y-m-d', strtotime($aSegmentData['sDepartureTime'])) . ", Trukmė " . $iDays . date('H v\a\l. i \m\i\n.', $aSector['iTotalDurationTime']) . "</div>";
						}
					}
				}
				else {
					echo "<div id=\"yellow\">" .  date('Y-m-d', strtotime($aSegmentData['sDepartureTime'])) . ", Trukmė " . date('H v\a\l. i \m\i\n.', $aSegmentData['iDuration'] * 60) . "</div>";
				}
			}
		
			echo "
					<div id=\"flightInfo\">
						<div class=\"time\">
								" . date('H:i', strtotime($aSegmentData['sDepartureTime'])) . "
								<span>" . date('Y-m-d', strtotime($aSegmentData['sDepartureTime'])) . "</span>
						</div>
						<div class=\"aeroport\">
								" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sDepartureCityName'] . "
								<span>" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sDepartureAirportName'] . "</span>
						</div>
						<div class=\"time\">
								" . date('H:i', strtotime($aSegmentData['sArrivalTime'])) . "
								<span>" . date('Y-m-d', strtotime($aSegmentData['sDepartureTime'])) . "</span>
						</div>
						<div class=\"aeroport\">
								" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sArrivalCityName'] . "
							<span>" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sArrivalAirportName'] . "</span>
						</div>
						<div class=\"duration\">
								<b>" . date('H v\a\l. </\b> i \m\i\n.', $aSegmentData['iDuration'] * 60) . "</div>
						<div class=\"code\">
								" . $aSegmentData['sOperatingCarrierCode'] . " " . $aSegmentData['sFlightNr'] . "
								<span>" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sMarketingCompanyName'] . "</span>
						</div>
					</div>";
				
			$iOrderId = $aSegmentData['iOrderAirId'];
			$iTransferTime = $aSegmentData['sArrivalTime'];
			$iSectorId = $aSegmentData['iSectorNr'];
	
		}
	}
}
else 
{
	echo "Dafuq, where is my array?";
	die;
}
?>

	<div id="additional">
		<div id="line">
			<div id="left">
				<img alt="luggae" src="https://www.greitai.lt/resources/images/spacer.gif" class="hand_luggage" />
			</div>
			
			<div id="right">
				<b>Rankinis bagažas</b> <br />
				Tai 1 kuprinė, rankinė arba lagaminas, kurį galite neštis į lėktuvo saloną nemokamai. <br />
				Išmatavimai paprastai negali viršyti 56x45x10 cm (Wizzair - 42 x 32 x 25 cm), svoris – <b>5</b> kg.  
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="line">
			<div id="left">
				<img alt="luggae" src="https://www.greitai.lt/resources/images/spacer.gif" class="luggage" />
			</div>
			
			<div id="right">
				<b>Registruotas bagažas</b> <br />
				Tai lagaminai, kurie bus gabenami lėktuvo krovinių skyriuje. Žemiau matysite svorio ir kiekio apribojimus pasirinktam pasiūlymui.
				<br />
				<table>
					<tbody>
						<tr>
							<th>Skrydžio segmentas</th>
							<th>Suaugusiam</th>
						</tr>
			<?php
				if(!empty($aFlightData)) {
					foreach($aFlightData as $aFlightDataBlock) {
						foreach($aFlightDataBlock['aSegments'] as $aSegmentKey => $aSegmentData) {
							$aLuggage = json_decode($aSegmentData['sLuggageAdt']);
							echo "
							<tr>
								<td>" . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sDepartureCityName'] . " - " . $aFlightDataBlock['aCodeNames'][$aSegmentKey]['sArrivalCityName'] . "</td>
								<td>" . $aLuggage->piece . "× <strong>" . $aLuggage->weight . "</strong> " . $aLuggage->measure . "/keleiviui</td>
							</tr>
							";
						}
					}
				}
			?>
					</tbody>
				</table>

				Viršijus nustatytą svorio normą, papildomi kilogramai bus apmokestinti. Tačiau kiekviena aviakompanija taiko skirtingus įkainius, todėl tokiu atveju mokėtiną sumą Jums galės pasakyti tik oro uosto darbuotojai.
				Jeigu matote, kad <b>bagažas nėra įskaičiuotas</b> į pasiūlymo kainą, jį galėsite įsigyti papildomai kitame rezervacijos žingsnyje arba oro uoste atvykus į skrydį.	
			</div>
		</div>
	</div>
	
	<div style="clear:both;"></div>

</div>

</body>
