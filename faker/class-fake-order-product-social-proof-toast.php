<?php
namespace Haosf_Social_Proof_Toaster;

class Fake_Order_Product_Social_Proof_Toast extends Order_Count_Product_Social_Proof_Toast {

	public $buyer_full_name;
	public $units_sold;

	public function __construct( \WC_Product $product, $buyer_full_name, $units_sold ) {
		$this->buyer_full_name = $buyer_full_name;
		$this->units_sold = $units_sold;
		parent::__construct( $product );
	}

	protected function get_message_top() {
		return sprintf( __( '<span>%s</span> <span>just bought</span>', 'haosf' ), $this->buyer_full_name );
	}

	protected function get_message_bottom() {
		return sprintf( __( 'Units Sold: %s', 'haosf' ), $this->units_sold );
	}
}
