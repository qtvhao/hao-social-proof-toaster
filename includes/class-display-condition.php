<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/16/2018
 * Time: 8:16 PM
 */

namespace Haosf_Social_Proof_Toaster;


class Display_Condition {
	public function is_toast_on_this_product_page() {
		$WC_product = wc_get_product();
		if ( is_product() and $WC_product instanceof \WC_Product and Plugin::instance()->setting( 'shown_in_product_page',
				true ) ) {
			$product_id     = $WC_product->get_id();
			$product_orders = Helper::get_product_orders( $product_id );
			$total_sales    = Helper::get_total_sales_per_product( $product_id );
			$is_product_ordered = ! empty( $product_orders ) and $product_orders[0] instanceof \WC_Order_Item_Product;
			$is_product_sold = isset( $total_sales->_qty ) and $total_sales->_qty > 0;

			$is_hidden_product_not_sold = Plugin::instance()->setting( 'hidden_for_product_not_sold_yet', true );
			if ( $is_product_ordered and $is_product_sold ) {
				return true;
			} else {
				if ( ! $is_hidden_product_not_sold ) {
					return true;//callback hell
				}
			}
		}

		return false;
	}
}
