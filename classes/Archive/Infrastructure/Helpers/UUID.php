<?php

namespace Archive\Infrastructure\Helpers;

class UUID {


	public static function generate( $len=8 ) {
		$hex = md5( "a5cc85f1-e89a-4cc6-86a6-5b58db9a774e" . uniqid( "", true ) );
		$pack = pack( 'H*', $hex );
		$uid = base64_encode( $pack );        // max 22 chars
		$uid = preg_replace( "#(*UTF8)[^A-Za-z0-9]#", "", $uid );    // mixed case
		if ( $len<4 ) $len=4;
		if ( $len>128 ) $len=128;                       // prevent silliness, can remove
		while ( strlen( $uid ) < $len ) $uid = $uid . gen_uuid( 22 );     // append until length achieved
		return substr( $uid, 0, $len );
	}
	
}

