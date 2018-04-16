<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/16/2018
 * Time: 4:52 PM
 */

namespace Haosf_Social_Proof_Toaster;


use WC_Order;

class Helper {
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
					$total[$item['product_id']] = [$item];
				} else {
					$total[$item['product_id']][] = $item;
				}
			}
		}
		return $total;
	}
}
