<?php

use Haosf_Social_Proof_Toaster\Plugin;

add_shortcode( 'haosf_random_address', function ($attrs = []) {
	$addresses_repository = Plugin::instance()->setting( 'addresses_repository', require_once 'address-repository.php');
	$addresses_repository = (is_string( $addresses_repository)?explode( PHP_EOL, $addresses_repository):$addresses_repository);
	shuffle( $addresses_repository);
	return Plugin::instance()->session->remember( 'uri', 'random_address', function () use ( $addresses_repository ) {
		return $addresses_repository[0];
	});
});
add_shortcode( 'haosf_random_name', function ($attrs = []) {
	$names_repository = Plugin::instance()->setting( 'names_repository', require 'names-repository.php' );
	$names_repository = (is_string( $names_repository)?explode( PHP_EOL, $names_repository):$names_repository);
	shuffle( $names_repository);
	return Plugin::instance()->session->remember( 'uri', 'random_name', function () use ( $names_repository ) {
		return $names_repository[0];
	});
});
add_shortcode( 'haosf_product', function ($attrs = []) {
	if ( $attrs['current'] ) {
		return get_the_title();
	}
	return '';
});
add_shortcode( 'haosf_random', function ($attrs = []) {
	$range = $attrs['range'];
	$min   = explode( ',', $range )[0];
	$max   = explode( ',', $range )[1];
	$session_remember = isset($attrs['session_remember'])?$attrs['session_remember']:false;
	if($session_remember === false) {
		return rand($min, $max);
	}
	$session_remember_salt = isset($attrs['session_remember_salt'])?$attrs['session_remember_salt']:'number_0';
	$session_remember_salt.=json_encode( $attrs);

	return Plugin::instance()->session->remember($attrs['session_remember_key'], $session_remember_salt, function() use ( $max, $min ) {
		return rand($min, $max);
	});
});
