<?php
/**
 * Plugin Name: Fake notification Viet Social Proof Toaster
 */

use Haosf_Social_Proof_Toaster\Fake_Order_Product_Social_Proof_Toast;
use Haosf_Social_Proof_Toaster\Order_Count_Product_Social_Proof_Toast;
use Haosf_Social_Proof_Toaster\Plugin;
use Haosf_Social_Proof_Toaster\Toast;

add_filter('haosf_prepare_toast', function(Toast$toast){
	if($toast instanceof Order_Count_Product_Social_Proof_Toast) {
		return '';
	}
	return $toast;
});
add_action('init', function(){
	if(!session_id()) {
		session_start();
	}
});
add_filter('haosf_default_toasts', function($toasts) {
	require_once 'faker/class-fake-order-product-social-proof-toast.php';
	if ( Plugin::instance()->conditions->is_toast_on_this_product_page() ) {
		$setting_names_repository = Plugin::instance()->setting( 'names_repository', [] );
		if ( empty( $setting_names_repository ) ) {
			$names_repository = require_once 'faker/names_repository.php';
		}else{
			$names_repository = $setting_names_repository;
		}

		$session_base_unit_product_key = 'haosf_base_unit_sold_' . wc_get_product()->get_id();
		$session_name_index_product_key = 'haosf_buyer_name_index_' . wc_get_product()->get_id();
		$base_unit_sold      = isset($_SESSION[ $session_base_unit_product_key ])?$_SESSION[ $session_base_unit_product_key ]: rand( 1000, 2000 );
		$buyer_name_index      = isset($_SESSION[ $session_name_index_product_key ])?$_SESSION[ $session_name_index_product_key ]: rand(0, count($names_repository) - 1);

		$_SESSION[ $session_base_unit_product_key ] = $base_unit_sold;
		$_SESSION[ $session_name_index_product_key ] = $buyer_name_index;

		$fake_order_toast = new Fake_Order_Product_Social_Proof_Toast( wc_get_product(), $names_repository[$buyer_name_index], $base_unit_sold );

		$toasts .= $fake_order_toast;
	}

	return $toasts;
});
