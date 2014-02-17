<?php if ( !defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * Created by "Coders"
 * User: Vytenis
 * Date: 13.2.6
 * Time: 10.00
 * © 2013
 * 126.92
 */

$config['loading_messages'] = array(

	'mc' => array(
		// String => wait time
		_('loading msg MC1') => '500',		// Contacting server
		_('loading msg MC2') => '1200',		// Checking offer
		_('loading msg MC3') => '900',		// Creating order
		_('loading msg MC4') => '2000',		// Booking seat on the aircraft
		_('loading msg MC5') => '800',		// Loading your data
		_('loading msg MC6') => '800',		// Preparing additional services
		_('loading msg MC7') => '1200',		// Configuring payment methods
		_('loading msg MC8') => '9000' 		// Finalizing order
	),
	'payment' => array(
		// String => wait time
		_('loading msg Payment1') => '1200',	// Checking offer
		_('loading msg Payment2') => '1200',	// Checking price
		_('loading msg Payment3') => '800',		// Establishing connection with the bank
		_('loading msg Payment4') => '1500',	// Starting transaction
		_('loading msg Payment5') => '500',		// Receiving transaction status
		_('loading msg Payment6') => '3000',	// Processing payment
		_('loading msg Payment7') => '9000'		// Administrating payment
	)
);
