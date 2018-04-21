<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/21/2018
 * Time: 12:04 PM
 */

namespace Haosf_Social_Proof_Toaster;


class Session {

	/**
	 * Session constructor.
	 */
	public function __construct() {

	}

	public function remember($session_remember_key, $name,callable $closure) {
		$session_remember_cache_key = md5( $_SERVER['REQUEST_URI'] . $name );
		if ( $session_remember_key === 'uri' ) {
			if ( isset( $_SESSION[ $session_remember_cache_key ] ) ) {
				return $_SESSION[ $session_remember_cache_key ];
			}
		}
		$_SESSION[ $session_remember_cache_key ] = call_user_func( $closure);
		return $_SESSION[ $session_remember_cache_key ];
	}
}
