# Debug Helper

To debug any type off data use the function *dbx();* - pass anny number of params.

	dbg( $aDataArray, $oDataObject, $iDataInteger );

Exemple output
> <span style="color: #DD0000">'services\_module/views/index.php'</span>
<br>
<span style="color:silver">#2 dbx() called at [core/Loader.php:1100]</span>
<br><span style="color:silver">#3 \_ci\_load() called at [core/Loader.php:624]</span>
<br><span style="color:silver">#4 view() called at [application/modules/services\_module/controllers/index.php:35]</span>

If the last parameter is the bolean *TRUE* the die() will be executed.

	dbg( $aDataArray, $oDataObject, $iDataInteger, TRUE );
