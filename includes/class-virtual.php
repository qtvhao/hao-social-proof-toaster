<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/21/2018
 * Time: 12:32 PM
 */

namespace Haosf_Social_Proof_Toaster;


class Virtual {
	public function register() {
		if(Plugin::instance()->setting( 'enable_virtual_product_order_toast', 'on') === 'on' and function_exists( 'wc_get_product')) {
			$this->enable_virtual_product_order_toast();
		}
	}
	public function enable_virtual_product_order_toast() {
		add_filter('haosf_post_toasts', '__return_empty_string', 11);
		add_filter('haosf_post_toasts', array($this, 'get_virtual_product_order_toast'), 12);
	}

	public function get_virtual_product_order_toast() {
		return new Product_Virtual_Social_Proof_Toast( wc_get_product() );
	}

}
