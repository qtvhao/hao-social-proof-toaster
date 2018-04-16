<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/16/2018
 * Time: 4:52 PM
 */

namespace Haosf_Social_Proof_Toaster;


use WC_Order;
use WC_Order_Item_Product;

class Helper {

	/**
	 * Thanks to https://vi.wordpress.org/plugins/woo-total-sales/
	 *
	 * @param string $product_id
	 *
	 * @return array|null|object
	 */
	public static function get_total_sales_per_product( $product_id = '' ) {
		global $wpdb;
		$post_status = array( 'wc-completed', 'wc-processing', 'wc-on-hold' );
		$order_items = $wpdb->get_row( $wpdb->prepare( " SELECT SUM( order_item_meta.meta_value ) as _qty, SUM( order_item_meta_3.meta_value ) as _line_total FROM {$wpdb->prefix}woocommerce_order_items as order_items

			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta ON order_items.order_item_id = order_item_meta.order_item_id
			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta_2 ON order_items.order_item_id = order_item_meta_2.order_item_id
			LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as order_item_meta_3 ON order_items.order_item_id = order_item_meta_3.order_item_id
			LEFT JOIN {$wpdb->posts} AS posts ON order_items.order_id = posts.ID

			WHERE posts.post_type = 'shop_order'			
			AND posts.post_status IN ( '" . implode( "','", $post_status ) . "' )
			AND order_items.order_item_type = 'line_item'
			AND order_item_meta.meta_key = '_qty'
			AND order_item_meta_2.meta_key = '_product_id'
			AND order_item_meta_2.meta_value = %s
			AND order_item_meta_3.meta_key = '_line_total'

			GROUP BY order_item_meta_2.meta_value

			", $product_id ) );

		return $order_items;
	}

	/**
	 * @param $product_id
	 *
	 * @return WC_Order_Item_Product[]
	 */
	public static function get_product_orders($product_id) {
		$order_ids    = array_map( function ( $order ) {
			return $order->id;
		}, wc_get_orders( [] ) );
		$total_orders = Helper::get_order_product_count( $order_ids );
		if(!isset($total_orders[$product_id])) {
			return [];
		}

		return $total_orders[$product_id];
	}

	/**
	 * @param $orders
	 *
	 * @return array
	 */
	public static function get_order_product_count( $orders ) {
		if( ! isset( $orders ) || empty( $orders ) || ! is_array( $orders ) )
			return [];
		$total = array();
		foreach( $orders as $order ) {
			$items = new WC_Order( $order );
			$items = $items->get_items();
			foreach( $items as $item ) {
				// If product doesn't exist in order total
				// then create it with quantity
				if( ! array_key_exists( $item['product_id'], $total ) ) {
					$total[$item['product_id']] = [$item];
				} else {
					$total[$item['product_id']][] = $item;
				}
			}
		}
		return $total;
	}
}
