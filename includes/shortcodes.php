<?php

use Haosf_Social_Proof_Toaster\Plugin;

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

	return Plugin::instance()->session->remember($attrs['session_remember_key'], $session_remember_salt, function() use ( $max, $min ) {
		return rand($min, $max);
	});
});
