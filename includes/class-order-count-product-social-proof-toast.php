<?php

namespace Haosf_Social_Proof_Toaster;

use WC_Order_Item_Product;

class Order_Count_Product_Social_Proof_Toast extends Product_Social_Proof_Toast {
	public function __construct( \WC_Product $product ) {
		parent::__construct( $product );
	}

	protected function get_close_image() {
		return false;
	}

	protected function get_image() {
		return wp_get_attachment_url( $this->get_product()->get_image_id() );
	}

	protected function get_message_top() {
		$product_orders     = Helper::get_product_orders( $this->get_product()->get_id() );
		if(!isset($product_orders[0])) {
			return '';
		}
		$order_item_product = $product_orders[0];
		if ( $order_item_product instanceof WC_Order_Item_Product ) {
			$shipping_full_name = $order_item_product->get_order()->get_formatted_shipping_full_name();
			if(empty( trim($shipping_full_name) ) ) {
				$shipping_full_name = __('Someone', 'haosf');
			}
		} else {
			return '';
		}

		return sprintf( __( '<span>%s</span> <span>just bought</span>', 'haosf' ), $shipping_full_name );
	}

	protected function get_message_middle() {
		$product_name = $this->get_product()->get_name();

		return $product_name;
	}

	protected function get_message_bottom() {
		$total_sales_per_product = Helper::get_total_sales_per_product( $this->get_product()->get_id() );
		if ( isset($total_sales_per_product) and isset($total_sales_per_product->_qty) ) {
			$total_sales = (int) $total_sales_per_product->_qty;
		} else {
			$total_sales = 0;
		}

		return sprintf( __( 'Units Sold: %s', 'haosf' ), $total_sales );
	}
}
