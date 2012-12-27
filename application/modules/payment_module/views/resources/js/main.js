wl.checkout.events.checkout_pay = {
	
	parent : wl.checkout,
	params : {
		dom : {},
		selectors : {
			payment_group : 'input.sb_payment_type'
		}
	},
	
	showPaymentFee : function() {
		
		if ( typeof this.parent.basket == 'undefined' ) {
			
			return false;
		}
		
		var basket = this.parent.basket;
				
		var payment_types = basket.params.dom.payment_types = $( basket.params.selectors.basket )
			.find( basket.params.selectors.payment_type );
		
		var payment_groups = this.params.dom.block.find( this.params.selectors.payment_group );
		
		return true;
	}
};

wl.checkout.pay = {
	
	parent : wl.checkout,
	params : {
		dom : {
			block : {},
			invoice_checkbox : {},
			invoice_form : {},
			paygroups : {},
			paytypes : {},
			input_cc_form : {},
			premium_form : {}
		},
		selectors : {
			block : '.sb_checkout_pay',
			invoice_checkbox  : 'input[name=invoice_status]',
			invoice_form      : 'div.invoice',
			paygroup_checkbox : 'input[name=sb_payment_group]',
			paytype_checkbox  : 'input[name=sb_payment_type]',
			payment_desc      : '.paydesc',
			payment_fee_value : '.payfee_',
			input_cc_form : '[name=cc_form]',
			premium_form : '#form_premium',
			premium_form_agree : '#premium1',
			premium_form_disagree : '#premium2'
		},
		fees : {},
		curr_paygroup : 0
	},
	
	init : function() {
		
		var _this = this;
		
		// Add dom elements
		_this.params.dom.block = _this.parent.params.dom.blocks.filter( _this.params.selectors.block );
		_this.params.dom.invoice_checkbox = _this.params.dom.block.find( _this.params.selectors.invoice_checkbox );
		_this.params.dom.invoice_form = _this.params.dom.block.find( _this.params.selectors.invoice_form );
		_this.params.dom.paygroups = _this.params.dom.block.find( this.params.selectors.paygroup_checkbox );
		_this.params.dom.paytypes = _this.params.dom.block.find( this.params.selectors.paytype_checkbox );
		_this.params.dom.input_cc_form = _this.params.dom.block.find( _this.params.selectors.input_cc_form );
		_this.params.dom.premium_form = _this.params.dom.block.find( _this.params.selectors.premium_form );
		
		// Add events
		_this.params.dom.paygroups.click( function() { _this.onPaygroupChange( this ); } );
		_this.params.dom.paytypes.click( function() { _this.onPaytypeChange( this ); } );
		_this.params.dom.invoice_checkbox.click( function() { _this.onInvoiceChange( this ); } );
		_this.parent.events.checkout_pay = {
			onBlockEnable : _this.onBlockEnable
		};

		// If only one paygroup exist - select it
		if ( _this.params.dom.paygroups.length == 1 ) {

			_this.params.dom.paygroups.trigger( 'click' );

			// If current block is inactive - set next block inactive too
			if ( !_this.params.dom.block.find( '.co_block_inactive' ).hasClass( 'd-n' ) ) {
				
				_this.params.dom.block
					.parent()
					.next()
						.find( '.co_block_container .co_block_inactive' )
							.removeClass( 'd-n' );
			}
		}

		// Check if pricing form is enabled if so first select the Premium service
		/*if ( $( _this.params.selectors.premium_form ).length > 0 ) {

			// Bind events
			var items = $( 'label', wl.checkout.pay.params.dom.premium_form );
			wl.checkout.services.bindServiceEvents400( items );
		}*/

		// Trigger selected paygroup click
		if ( _this.params.dom.block.find( _this.parent.params.selectors.block_inactive ).hasClass( 'd-n' ) ) {

			var selected_paygroup = _this.params.dom.paygroups.filter( ':checked' ).get(0);

			if ( selected_paygroup ) {

				_this.onPaygroupChange( selected_paygroup );
			}
		}
	},
	
	onBlockEnable : function() {
		
		var self = wl.checkout.pay;
		
		self.params.dom.paygroups.filter( ':checked' ).trigger( 'click' );

		// Check if pricing form is enabled if so first select the Premium service
		if ( $( self.params.selectors.premium_form ).length > 0 ) {

			// Activate the premium service
			$( self.params.selectors.premium_form_agree, wl.checkout.pay.params.dom.premium_form ).trigger( 'click' );
		}

		return true;
	},
	
	onInvoiceChange : function( elem ) {
		
		var
			input = $( elem ),
			self = wl.checkout.pay
		;
		
		if ( input.attr( 'checked' ) ) {
			
			self.params.dom.invoice_form.removeClass( 'd-n' );
		} else {
			
			self.params.dom.invoice_form.addClass( 'd-n' );
		}
	},
	
	onPaygroupChange : function( item, skip_next ) {
		
		var
			self = wl.checkout.pay,
			radio = $( item ),
			paytypes = radio.parent().parent().find( self.params.selectors.paytype_checkbox )
		;
			
		
		// Set current payment group
		self.params.curr_paygroup = radio.val();
		
		wl.tracker.triggerPayGroup( self.params.curr_paygroup );
		
		// Hide visible payment description
		radio.parent().parent().parent()
			.find( self.params.selectors.payment_desc )
			.addClass( 'd-n' );
			
		// Show current payment description
		radio.parent()
			.next( self.params.selectors.payment_desc )
			.removeClass( 'd-n' );
		
		wl.errors.removeFormErrors( self.parent.params.selectors.form_errors, self.parent.params.selectors.form_error_item );
		
		if ( typeof skip_next == 'undefined' ) {
			
			wl.checkout.nextStep( radio, false );
		}
		
		// Check payment type
		if ( !paytypes.filter( ':checked' ).get(0) ) {
			
			paytypes.filter( ':first' ).attr( 'checked', 'checked' ).trigger( 'click' );
		}
		
		// Set custom payment activate event
		eval( 'var customActMethod = self.onPaygroupActivate' + radio.val() );
		
		// Invoke custom payment deactivate events
		self.params.dom.paygroups.not( this ).each( function( key, item ) {
			
			item = $( item );
			
			// Set custom payment deactivate event
			eval( 'var customDeactMethod = self.onPaygroupDeactivate' + item.val() );
		
			// Trigger deactivate event
			if ( typeof customDeactMethod != 'undefined' ) {
				
				customDeactMethod( item, self );
			}
		} );
		
		// Trigger activate event
		if ( typeof customActMethod != 'undefined' ) {
			
			return customActMethod( radio, self );
		}
		
		return false;
	},
	
	onPaygroupActivate1 : function( radio, self ) {
		
		self.params.dom.input_cc_form.val( 1 );
	},
	
	onPaygroupDeactivate1 : function( radio, self ) {
		
		self.params.dom.input_cc_form.val( 0 );
	},
	
	onPaygroupActivate6 : function( radio, self ) {
		
		self.params.dom.input_cc_form.val( 0 );
	},
	
	onPaytypeChange : function( elem ) {
		
		var
			self = wl.checkout.pay,
			payid = elem.value,
			payfee = self.params.fees[payid],
			payment_fees_selectors = []
		;

		if ( payid == 16) {

			$( '#help_cvc' ).bt( $('#cvc_text').html(), {
				trigger: ['mouseover','mouseout'],
				shrinkToFit: true,
				width: '300px',
				positions: ['top','left'],
				fill: '#fff799',
				strokeWidth: 0,
				spikeLength: 25,
				spikeGirth: 30,
				padding: '15px 18px',
				cornerRadius: 15
			} );
		}
		if ( payid == 3000 ) {
			if ( $('.order_s_code' ).val() != '' ) {
				$('.getOrderCode' ).html( $('.order_s_code' ).val());
			}

			$('.order_s_code' ).change( function(){
				if ( $('.order_s_code' ).val() != '' ) {
					$('.getOrderCode' ).html( $('.order_s_code' ).val() );
				}
			});

		}
		
		if ( typeof payfee == 'undefined' ) {
			
			return false;
		}
		
		var order_price = wl.checkout.getPricePart( 'order' );
		
		// Count fee value depending on fixed or percent value given
		var order_payment_fee = 0;
		
		// Percent part
		if ( payfee.fPercent ) {
			
			order_payment_fee += Math.ceil( order_price / 100 * parseFloat( payfee.fPercent ) );
		}
		
		// Fixed part
		if ( payfee.fFix ) {
			
			order_payment_fee += parseFloat( payfee.fFix );
		}
		
		// Add fee to price
		wl.checkout.recalculatePrice( 'payment_fee', order_payment_fee );
		
		// Basket paygroup part
		if ( typeof self.parent.basket != 'undefined' ) {
			
			// Hide current visible paygroup desc
			self.parent.basket.params.dom.payment_groups
				.addClass( 'd-n' );
			self.parent.basket.params.dom.payment_groups_holder
				.addClass( 'd-n' );
			
			// Show selected paygroup
			if ( order_payment_fee > 0 ) {
				
				self.parent.basket.params.dom.payment_groups
					.filter( self.parent.basket.params.selectors.payment_group_id + self.params.curr_paygroup )
					.removeClass( 'd-n' );
					
				self.parent.basket.params.dom.payment_groups_holder.removeClass( 'd-n' );
			}
		}
		
		// Add element for fee value change in basket
		if ( order_payment_fee > 0 && typeof self.parent.basket!= 'undefined' && typeof self.parent.basket.params.selectors.payment_fee_value != 'undefined' ) {
			
			payment_fees_selectors.push( self.parent.basket.params.selectors.payment_fee_value );
		}
		
		// Add element for fee value change in payment group description
		if ( typeof self.params.selectors.payment_fee_value != 'undefined' ) {
			
			payment_fees_selectors.push( self.params.selectors.payment_fee_value + self.params.curr_paygroup );
		}
		
		// Change fee value in given elements
		if ( payment_fees_selectors.length > 0 ) {
			
			payment_fees_selectors = payment_fees_selectors.join( ', ' );
			
			$( payment_fees_selectors ).text( order_payment_fee );
			
			return true;
		}
		
		return false;
	}
};

$( function() {
	
	wl.checkout.init();
	
	if ( typeof wl.checkout.basket != 'undefined' ) {
		
		wl.checkout.basket.init();
	}
	
	wl.checkout.pay.init();

	// Show invoice click event
	$( '.sb_payment_invoice_btransfer' ).click( function() {

		$.fancybox.showActivity();

		var code = this.title.match( /.+_order_(.*)/ )[1];

		var url = preJsGlobalVals.sSiteUrl + 'userspace/invoice/bank_transfer/1/code/' + $('.order_s_code' ).val();
		var inputs = $( '#sb_payment_invoice_form_' + code + ' .input' );
		var data = inputs.serialize();                                                                                                      

		if ( !$( '#payForOrder_' + code + ' [name=invoice_status]' ).not( ':checked' ) ) {

			data = '';
		}

		$.ajax( {
			type	: 'post',
			cache   : false,
			url     : url,
			data	: data,
			success: function( data ) {

				$.fancybox( data );
			}
		} );

		return false;
	} );

} );

/*-------------------------------------------------------------------- 
 * JQuery Plugin: "EqualHeights" & "EqualWidths"
 * by:	Scott Jehl, Todd Parker, Maggie Costello Wachs (http://www.filamentgroup.com)
 *
 * Copyright (c) 2007 Filament Group
 * Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)
 *
 * Description: Compares the heights or widths of the top-level children of a provided element 
 and sets their min-height to the tallest height (or width to widest width). Sets in em units 
 by default if pxToEm() method is available.
 * Dependencies: jQuery library, pxToEm method	(article: http://www.filamentgroup.com/lab/retaining_scalable_interfaces_with_pixel_to_em_conversion/)							  
 * Usage Example: $(element).equalHeights();
 Optional: to set min-height in px, pass a true argument: $(element).equalHeights(true);
 * Version: 2.0, 07.24.2008
 * Changelog:
 *  08.02.2007 initial Version 1.0
 *  07.24.2008 v 2.0 - added support for widths
 --------------------------------------------------------------------*/

$.fn.equalHeights = function(px) {
	$(this).each(function(){
		var currentTallest = 0;
		$(this).children().each(function(i){
			if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
		});
		if (!px || !Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
		// for ie6, set height since min-height isn't supported
		if ($.browser.msie && $.browser.version == 6.0) { $(this).children().css({'height': currentTallest}); }
		$(this).children().css({'min-height': currentTallest});
	});
	return this;
};

/*-------------------------------------------------------------------- 
 * javascript method: "pxToEm"
 * by:
 Scott Jehl (scott@filamentgroup.com) 
 Maggie Wachs (maggie@filamentgroup.com)
 http://www.filamentgroup.com
 *
 * Copyright (c) 2008 Filament Group
 * Dual licensed under the MIT (filamentgroup.com/examples/mit-license.txt) and GPL (filamentgroup.com/examples/gpl-license.txt) licenses.
 *
 * Description: Extends the native Number and String objects with pxToEm method. pxToEm converts a pixel value to ems depending on inherited font size.  
 * Article: http://www.filamentgroup.com/lab/retaining_scalable_interfaces_with_pixel_to_em_conversion/
 * Demo: http://www.filamentgroup.com/examples/pxToEm/	 	
 *							
 * Options:  	 								
 scope: string or jQuery selector for font-size scoping
 reverse: Boolean, true reverses the conversion to em-px
 * Dependencies: jQuery library						  
 * Usage Example: myPixelValue.pxToEm(); or myPixelValue.pxToEm({'scope':'#navigation', reverse: true});
 *
 * Version: 2.0, 08.01.2008 
 * Changelog:
 *		08.02.2007 initial Version 1.0
 *		08.01.2008 - fixed font-size calculation for IE
 --------------------------------------------------------------------*/

Number.prototype.pxToEm = String.prototype.pxToEm = function(settings){
	//set defaults
	settings = jQuery.extend({
		scope: 'body',
		reverse: false
	}, settings);

	var pxVal = (this == '') ? 0 : parseFloat(this);
	var scopeVal;
	var getWindowWidth = function(){
		var de = document.documentElement;
		return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
	};

	/* When a percentage-based font-size is set on the body, IE returns that percent of the window width as the font-size. 
	 For example, if the body font-size is 62.5% and the window width is 1000px, IE will return 625px as the font-size. 	
	 When this happens, we calculate the correct body font-size (%) and multiply it by 16 (the standard browser font size) 
	 to get an accurate em value. */

	if (settings.scope == 'body' && $.browser.msie && (parseFloat($('body').css('font-size')) / getWindowWidth()).toFixed(1) > 0.0) {
		var calcFontSize = function(){
			return (parseFloat($('body').css('font-size'))/getWindowWidth()).toFixed(3) * 16;
		};
		scopeVal = calcFontSize();
	}
	else { scopeVal = parseFloat(jQuery(settings.scope).css("font-size")); };

	var result = (settings.reverse == true) ? (pxVal * scopeVal).toFixed(2) + 'px' : (pxVal / scopeVal).toFixed(2) + 'em';
	return result;
};
