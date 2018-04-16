<?php

namespace Haosf_Social_Proof_Toaster;

use WC_Order;

class Order_Count_Product_Social_Proof_Toast extends Product_Social_Proof_Toast{
	public function __construct( \WC_Product $product ) {
		parent::__construct( $product );
	}

	protected function get_image() {
		return wp_get_attachment_url($this->get_product()->get_image_id());
	}
	public static function get_order_product_count( $orders ) {
		if( ! isset( $orders ) || empty( $orders ) || ! is_array( $orders ) )
			return 0;
		$total = array();
		foreach( $orders as $order ) {
			$items = new WC_Order( $order );
			$items = $items->get_items();
			foreach( $items as $item ) {
				// If product doesn't exist in order total
				// then create it with quantity
				if( ! array_key_exists( $item['product_id'], $total ) ) {
					$total[$item['product_id']] = (int) $item['qty'];
				} else {
					$total[$item['product_id']] += (int) $item['qty'];
				}
			}
		}
		return $total;
	}
	protected function get_message_top() {
		$product_orders = $this->get_product_orders();

		if ( isset($product_orders) ) {
			$orders_count = count($product_orders);
		} else {
			$orders_count = 0;
		}

		return sprintf(_n('Someone just bought', '%s people just bought', $orders_count, 'haosf'), $orders_count);
	}

	protected function get_message_middle() {
		$product_name = $this->get_product()->get_name();
		return $product_name;
	}

	/**
	 * Thanks to https://vi.wordpress.org/plugins/woo-total-sales/
	 * @param string $product_id
	 *
	 * @return array|null|object
	 */
	public static function get_total_sales_per_product($product_id ='') {
		global $wpdb;
		$post_status = array( 'wc-completed', 'wc-processing', 'wc-on-hold' );
		$order_items = $wpdb->get_row( $wpdb->prepare(" SELECT SUM( order_item_meta.meta_value ) as _qty, SUM( order_item_meta_3.meta_value ) as _line_total FROM {$wpdb->prefix}woocommerce_order_items as order_items

			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta ON order_items.order_item_id = order_item_meta.order_item_id
			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta_2 ON order_items.order_item_id = order_item_meta_2.order_item_id
			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta_3 ON order_items.order_item_id = order_item_meta_3.order_item_id
			LEFT JOIN {$wpdb->posts} AS posts ON order_items.order_id = posts.ID

			WHERE posts.post_type = 'shop_order'			
			AND posts.post_status IN ( '".implode( "','", $post_status )."' )
			AND order_items.order_item_type = 'line_item'
			AND order_item_meta.meta_key = '_qty'
			AND order_item_meta_2.meta_key = '_product_id'
			AND order_item_meta_2.meta_value = %s
			AND order_item_meta_3.meta_key = '_line_total'

			GROUP BY order_item_meta_2.meta_value

			", $product_id));

		return $order_items;
	}

	protected function get_message_bottom() {
		return __('Just now', 'haosf');
	}

	private function get_product_orders() {

		$order_ids    = array_map( function ( $order ) {
			return $order->id;
		}, wc_get_orders( [] ) );
		$total_orders = static::get_order_product_count( $order_ids );
		$product_id   = $this->get_product()->get_id();
		if(!isset($total_orders[$product_id])) {
			return [];
		}

		return $total_orders[$product_id];
	}

}
