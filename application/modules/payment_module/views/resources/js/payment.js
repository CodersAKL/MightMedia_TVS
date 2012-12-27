window.core = {
	sBaseUrl : 'http://dev/tomas/wl2/'
} 

window.payment = {
		
    pay: function( code )  {
        		
		var aPostData = $("#payment_block_" + code).serialize();
		$.post(window.core.sBaseUrl + 'ajax/pay/' + code , aPostData , window.payment.onPaymentRequestSuccess);
	},

	onPaymentRequestSuccess: function( data ) 
	{
		try
		{
			alert(data.sCode);
			 //throw "too low";
		}
		catch(err)
		{
			alert(err);
		}
	}
}


/*

	sendCheckoutData : function( sOrderCode ) {
		
		wl.tracker.trigger( 353, sOrderCode, 78 );
		
		var self = this;
		var post_data = $( '#main_form_' + sOrderCode + ' input, #main_form_' + sOrderCode + ' select' ).serializeArray();
		var debug_data = {};
		
		$.each( post_data, function( key, item ) { if ( item.name != 'cc_cvc' ) debug_data[item.name] = item.value; } );

		$.ajax( {
			type: 'post',
			url: wl.oJsGlobalVals.sSiteUrl + 'ajax/payment_price/method/submit',
			data: post_data,
			dataType: 'json',
			timeout: 60000,
			error : function( jqXHR, textStatus, errorThrown ) {
				
				var debug = {
					xhr : jqXHR,
					status : textStatus,
					text : errorThrown,
					request : debug_data
				};
				
				wl.tracker.trigger( 354, debug, 353 );
				
				wl.errors.init();
				wl.errors.showErrorDialog( [ self.params.messages.timeout ], window.location.href, { 'continue_redir' : 1 } );
			},
			success: function( data ) {

				wl.tracker.trigger( 355, debug_data, 353 );

				// Clear errors
				wl.errors.init();
				wl.errors.removeFormErrors( self.params.selectors.form_errors, self.params.selectors.form_error_item );

				if ( data.aOk ) {
					
					wl.tracker.trigger( 356, '', 355 );
					
					// Error url
					if ( data.sErrorRedirectUrl ) {
						
						wl.tracker.trigger( 357, data.sErrorRedirectUrl, 356, function() {
							
							window.parent.location.href = data.sErrorRedirectUrl;
						} );
					
					// Redirect url
					} else if ( data.sRedirectUrl ) {
						
						wl.tracker.trigger( 358, data.sRedirectUrl, 356, function() {
							
							window.parent.location.href = data.sRedirectUrl;
						} );
					
					// Payment url
					} else if ( data.sPaymentUrl ) {
						
						wl.tracker.trigger( 359, data.sPaymentUrl, 356, function() {
							
							window.parent.location.href = data.sPaymentUrl;
						} );
					
					// No action
					} else {
					
						wl.tracker.trigger( 360, data, 356 );
					}
					
					return true;
				} else {
					
					wl.tracker.trigger( 361, data, 355 );
					
					if ( typeof data.iRemovePaymentType != 'undefined' ) {
						
						$( '[id^=sb_payment_type_' + data.iRemovePaymentType + ']' )
							.parent()
							.parent()
							.addClass('d-n');
					}
					
					var redirect = ( typeof data.sErrorRedirectUrl != 'undefined' )
						? data.sErrorRedirectUrl
						: false;

					self.hideWaitingScreen();
						
					//Show popup
					 
					if ( !$.isEmptyObject( data.aErrorsPopup ) ) {

						wl.errors.init();
						wl.errors.removeFormErrors( self.params.selectors.form_errors, self.params.selectors.form_error_item );
						wl.errors.showErrorDialog( data.aErrorsPopup, redirect, {close_redir : !redirect} );

						return false;
					}

					// redirect
					if ( redirect !== false ) {

						window.parent.location.replace( redirect );
					}

					// display errors
					if ( !$.isEmptyObject( data.aErrors ) ) {
						
						wl.errors.init();
						wl.errors.removeFormErrors( self.params.selectors.form_errors, self.params.selectors.form_error_item );
						
						wl.errors.showFormErrors(
							data.aErrors,
							data.aFields,
							self.params.selectors.form_errors_group,
							self.params.selectors.form_error_item,
							wl.errors.moveToFirstError
						);
					}
				}
				
				self.hideWaitingScreen();
				
				if ( typeof checkIfOk == 'function' ) {
					
					setTimeout( 'checkIfOk()', 2000 );
				}
			}
		} );
	},
*/	
	