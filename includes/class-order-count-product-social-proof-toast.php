<?php

namespace Haosf_Social_Proof_Toaster;

class Order_Count_Product_Social_Proof_Toast extends Product_Social_Proof_Toast{
	public function __construct( \WC_Product $product ) {
		parent::__construct( $product );
	}

	protected function get_image() {
		return wp_get_attachment_url($this->getProduct()->get_image_id());
	}

}
