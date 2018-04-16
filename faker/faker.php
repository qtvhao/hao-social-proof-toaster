<?php
/**
 * Plugin Name: Fake notification Viet Social Proof Toaster
 */

use Haosf_Social_Proof_Toaster\Fake_Order_Product_Social_Proof_Toast;

add_action('plugins_loaded', function(){
	require_once 'class-fake-order-product-social-proof-toast.php';
	if ( true ) {
		$fake_order_toast = new Fake_Order_Product_Social_Proof_Toast( new WC_Product() );
	}
});
