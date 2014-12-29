<?php

/**
 * Debug function
 *
 * @return bool
 * @internal param mixed $mArg data to debug
 * @internal param \the $if second argument is equal to (int)1 - then exit
 */
function dbx()
{

	if ( ENVIRONMENT != 'development' ) {

		return false;
	}

	$aArgsList = func_get_args();

	call_user_func_array( '_debug_x', $aArgsList );
}

/**
 * Don't use this function directly!!!
 *
 * @return bool
 */
function _debug_x()
{

	$aTrace    = debug_backtrace();
	$aArgsList = func_get_args();
	$mLast     = end( $aArgsList );
	$sTrace    = '';
	$iTemp     = '';

	// Remove first argument
	$aArgsList = array_shift( $aArgsList );

	echo str_replace(
		array( '&lt;?php&nbsp;', '?&gt;' ), '', highlight_string( '<?php '.var_export( $aArgsList, 1 ).'?>', 1 )
	);

	foreach ( $aTrace as $k => $v ) {

		if ( isset( $v['file'] ) && basename( $v['file'] ) == 'Profiler.php' ) {

			return true;
		}
		if ( $k < 2 || $k > 5 || !isset( $v['file'] ) ) {

			continue;
		}
		if ( $v['function'] == "include" || $v['function'] == "include_once" || $v['function'] == "require_once"
			|| $v['function'] == "require"
		) {

			$sTrace
				.=
				"#".$k." ".$v['function']."(".$v['args'][0].") called at [".str_replace( BASEPATH, '', $v['file'] ).":"
					.$v['line']."]<br />";
		}
		else {

			$sTrace .= "#".$k." ".$v['function']."() called at [".str_replace( BASEPATH, '', $v['file'] ).":".$v['line']
				."]<br />";
		}
	}
	echo '<span style="color:silver">'.$sTrace.'</span>';

	if ( sizeof( $aArgsList ) > 1 && $mLast === true ) {

		die();
	}

	return true;
}

/**
 * Debug for office ip
 *
 * @return bool
 */
function dbr()
{

	$aArgsList = func_get_args();

	if ( !isDebugIp() && ENVIRONMENT != 'development' ) {

		return false;
	}

	return call_user_func_array( '_debug_x', $aArgsList );
}

function nn( $title, $error, $_email_to = 'developer@localhost.lt' )
{
	$debug       = debug_backtrace();
	$error_place = $debug[0]['file'].' | '.$debug[0]['line'];

	if ( isset( $debug[1]['file'] ) and isset( $debug[1]['line'] ) ) {
		$error_place .= "\n".$debug[1]['file'].' | '.$debug[1]['line'];
	}
	if ( isset( $debug[2]['file'] ) and isset( $debug[2]['line'] ) ) {
		$error_place .= "\n".$debug[2]['file'].' | '.$debug[2]['line'];
	}

	$mail_body = "Error type: ".$title."\n\n";
	$mail_body .= "Error place: ".$error_place."\n\n";
	$mail_body .= "Error info: \n".''.print_r( $error, 1 ).''."\n\n";

	$mail_body .= "Error info: \n".''.serialize( $error ).''."\n\n";

	$mail_body .= "\n\nSERVERIS\n".print_r( $_SERVER, 1 )."\n\n";

	mail( $_email_to, 'WL debug! '.$title, $mail_body, "From: errors@localhost.lt \n" );
}

/**
 * Title, Time, File, Line, Message
 *
 * @param string $sTitle
 * @param string $sMessage
 * @param string $sUser
 *
 * @return bool True/False
 */
function dbg( $sTitle, $sMessage, $sUser = 'developers' )
{

	$config   = & get_config();
	$aTrace   = debug_backtrace();
	$log_path = ( $config['log_path'] != '' ) ? $config['log_path'] : BASEPATH.'logs/rss/';

	// Prepare file name
	$sFilePath = $log_path.$sUser.'-'.date( 'Y-m-d' ).'.txt';

	if ( !is_dir( $log_path ) || !is_really_writable( $log_path ) ) {

		return false;
	}

	if ( !$fp = @fopen( $sFilePath, FOPEN_WRITE_CREATE ) ) {

		return false;
	}

	$sMessage = $sTitle
		.'|'
		.date( 'H:i:s' )
		.'|'
		.str_replace( FCPATH, '', $aTrace[0]['file'] )
		.'|'
		.$aTrace[0]['line']
		.'|'
		.trim(
			str_replace(
				array( "\n", "\r\n", '  ', '|', "\t" ), // Remove new lines and replace space symbol
				array( '[br]', '[br]', '&nbsp;', '¦', '&nbsp;&nbsp;&nbsp;&nbsp;' ),
				var_export( $sMessage, 1 ).( !empty( $aTrace[1]['file'] ) ?
					'[br]//'.$aTrace[1]['file'].':'.$aTrace[1]['line'] : '' )
			)
		)
		.PHP_EOL;

	flock( $fp, LOCK_EX );
	fwrite( $fp, $sMessage );
	flock( $fp, LOCK_UN );
	fclose( $fp );

	@chmod( $sFilePath, FILE_WRITE_MODE );
	log_message( 'debug', $sMessage );

	return true;
}

function isDebugIp()
{

	// Grab ips from config
	$aAllowedIps = array(  );

	if ( 0
		|| ( in_array( $_SERVER['REMOTE_ADDR'], $aAllowedIps ) )
		|| ( isset( $_SERVER['HTTP_X_REAL_IP'] ) && in_array( $_SERVER['HTTP_X_REAL_IP'], $aAllowedIps ) )
		|| ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && in_array( $_SERVER['HTTP_X_FORWARDED_FOR'], $aAllowedIps ) )
	) {

		return true;
	}

	return false;
}

/**
 * User tracking ID, Message
 *
 * @param string $sUserTrackingId
 * @param string $sMessage
 *
 * @return bool True/False
 */
function dbt( $sUserTrackingId, $sMessage )
{

	$config   = & get_config();
	$aTrace   = debug_backtrace();
	$log_path = ( $config['log_path'] != '' ) ? $config['log_path'] : BASEPATH.'logs/trace/';

	// Prepare file name
	$sFilePath = $log_path.$sUserTrackingId.'-'.date( 'Y-m-d' ).'.html';

	if ( !is_dir( $log_path ) || !is_really_writable( $log_path ) ) {

		return false;
	}

	if ( !$fp = @fopen( $sFilePath, FOPEN_WRITE_CREATE ) ) {

		return false;
	}

	$sMessage = $sUserTrackingId
		.'|'
		.date( 'H:i:s' )
		.'|'
		.str_replace( FCPATH, '', $aTrace[0]['file'] )
		.'|'
		.$aTrace[0]['line']
		.'|'
		.trim(
			str_replace(
				array( "\n", "\r\n", '  ', '|', "\t" ), // Remove new lines and replace space symbol
				array( '<br />', '<br /><br />', '&nbsp;', '¦', '&nbsp;&nbsp;&nbsp;&nbsp;' ),
				var_export( $sMessage, 1 ).( !empty( $aTrace[1]['file'] ) ?
					'[br]//'.$aTrace[1]['file'].':'.$aTrace[1]['line'] : '' )
			)
		)
		.PHP_EOL;

	flock( $fp, LOCK_EX );
	fwrite( $fp, '<br /><br />'.$sMessage );
	flock( $fp, LOCK_UN );
	fclose( $fp );

	@chmod( $sFilePath, FILE_WRITE_MODE );

	return true;
}
