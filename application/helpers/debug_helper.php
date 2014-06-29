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
	return true;
}

/**
 * Don't use this function directly!!!
 *
 * @return bool
 */
function _debug_x()
{

	$oCI = get_instance();
	$aTrace    = debug_backtrace();
	$aArgsList = func_get_args();
	$sTrace    = '';
	$bAjax = $oCI->input->is_ajax_request();

	if ( !$bAjax ) {
		echo '<fieldset><legend><h4>Debug info:</h2></legend>';
	}
	foreach( $aArgsList as $iArgId => $mArg ) {
		if ( $oCI->input->is_ajax_request() ) {
			echo Dbg::dump($mArg, 10, false )."\n";
		} else {
			echo '<h5>Param #'.($iArgId+1)."</h4>" .
				"<pre>".Dbg::dump($mArg, 10, true )."</pre>";
		}
	}
	if ( !$bAjax ) {
		echo "<h5>Trace:</h3>";
	}

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
			$sTrace .= "#".$k." ".$v['function']."(".$v['args'][0].") called at [".str_replace( BASEPATH, '', $v['file'] ).":" .$v['line']."]\n";
		}
		else {
			$sTrace .= "#".$k." ".$v['function']."() called at [".str_replace( BASEPATH, '', $v['file'] ).":".$v['line'] ."]\n";
		}
	}
	if ( !$bAjax ) {
		echo '<pre style="color:silver">' . $sTrace . '</pre></fieldset>';
	} else {
		echo $sTrace;
	}

	return true;
}

function nn( $title, $error, $_email_to )
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

	$mail_body .= "\n\nSERVER\n".print_r( $_SERVER, 1 )."\n\n";

	mail( $_email_to, 'Debug! '.$title, $mail_body, "From: errors@localhost \n" );
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
 * TVarDumper class file
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2008 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @version $Id$
 * @package System.Util
 */

/**
 * TVarDumper class.
 *
 * TVarDumper is intended to replace the buggy PHP function var_dump and print_r.
 * It can correctly identify the recursively referenced objects in a complex
 * object structure. It also has a recursive depth control to avoid indefinite
 * recursive display of some peculiar variables.
 *
 * TVarDumper can be used as follows,
 * <code>
 *   echo TVarDumper::dump($var);
 * </code>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id$
 * @package System.Util
 * @since 3.0
 */
class Dbg
{
	private static $_objects;
	private static $_output;
	private static $_depth;

	/**
	 * Converts a variable into a string representation.
	 * This method achieves the similar functionality as var_dump and print_r
	 * but is more robust when handling complex objects such as PRADO controls.
	 * @param mixed variable to be dumped
	 * @param integer maximum depth that the dumper should go into the variable. Defaults to 10.
	 * @return string the string representation of the variable
	 */
	public static function dump($var,$depth=10,$highlight=true)
	{
		self::$_output='';
		self::$_objects=array();
		self::$_depth=$depth;
		self::dumpInternal($var,0);
		if($highlight)
		{
			$result=highlight_string("<?php\n".self::$_output,true);
			return preg_replace('/&lt;\\?php<br \\/>/','',$result,1);
		}
		else
			return self::$_output;
	}

	private static function dumpInternal($var,$level)
	{
		switch(gettype($var))
		{
		case 'boolean':
			self::$_output.=$var?'true':'false';
			break;
		case 'integer':
			self::$_output.="$var";
			break;
		case 'double':
			self::$_output.="$var";
			break;
		case 'string':
			self::$_output.="'$var'";
			break;
		case 'resource':
			self::$_output.='{resource}';
			break;
		case 'NULL':
			self::$_output.="null";
			break;
		case 'unknown type':
			self::$_output.='{unknown}';
			break;
		case 'array':
			if(self::$_depth<=$level)
				self::$_output.='array(...)';
			else if(empty($var))
				self::$_output.='array()';
			else
			{
				$keys=array_keys($var);
				$spaces=str_repeat(' ',$level*4);
				self::$_output.="array\n".$spaces.'(';
				foreach($keys as $key)
				{
					self::$_output.="\n".$spaces."    [$key] => ";
					self::$_output.=self::dumpInternal($var[$key],$level+1);
				}
				self::$_output.="\n".$spaces.')';
			}
			break;
		case 'object':
			if(($id=array_search($var,self::$_objects,true))!==false)
				self::$_output.=get_class($var).'#'.($id+1).'(...)';
			else if(self::$_depth<=$level)
				self::$_output.=get_class($var).'(...)';
			else
			{
				$id=array_push(self::$_objects,$var);
				$className=get_class($var);
				$members=(array)$var;
				$keys=array_keys($members);
				$spaces=str_repeat(' ',$level*4);
				self::$_output.="$className#$id\n".$spaces.'(';
				foreach($keys as $key)
				{
					$keyDisplay=strtr(trim($key),array("\0"=>':'));
					self::$_output.="\n".$spaces."    [$keyDisplay] => ";
					self::$_output.=self::dumpInternal($members[$key],$level+1);
				}
				self::$_output.="\n".$spaces.')';
			}
			break;
		}
	}
}
