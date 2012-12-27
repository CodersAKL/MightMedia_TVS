window.core
{
	sBaseUrl = 'http://dev/tomas/wl2/';
} 

window.payments = {
		
    pay: function( code )  {
        
		var data = $("#payment_block_T7SUV8R").serialize();
		alert(data);
		
		//$.post(window.core.sBaseUrl + 'ajax/pay/' + code ,window.payments.onPaymentRequestSuccess);
	},

	onPaymentRequestSuccess: function( data ) 
	{
	   alert(data)
	}
}



