# Debug Helper

To debug any type off data use the function _**dbx();**_ - pass anny number of params.

	dbx( $aDataArray, $oDataObject, $iDataInteger );

Exemple output
> 
<fieldset><legend><h4>Debug info:</h4></legend>
<h5>Param #1</h5>
<pre>
  <span style="color: #DD0000">'Exemple'</span>
</pre>
<h5>Trace:</h5>
<span style="color:silver">
	#2 dbx() called at [D:\vytenis\wamp\www\MightMedia_TVS\application\controllers\welcome.php:80]
	#4 call_user_func_array() called at [D:\vytenis\wamp\www\MightMedia_TVS\system\core\CodeIgniter.php:521]
	#5 call_controller() called at [D:\vytenis\wamp\www\MightMedia_TVS\system\core\CodeIgniter.php:716]
</span></fieldset>
