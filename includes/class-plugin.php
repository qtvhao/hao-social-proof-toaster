<?php

namespace Haosf_Social_Proof_Toaster;

class Plugin {
	/**
	 * @var Plugin
	 */
	private static $instance;

	public static function autoload() {
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init_hooks() {
		add_action('wp_footer', 'haosf_footer', 0);
	}

	public function enqueue_styles() {
		wp_enqueue_style( 'haosf-social-proof-toaster-main-css', HAOSF_ASSETS_URL . 'css/haosf-main.css');
	}
}
