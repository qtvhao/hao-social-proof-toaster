<?php

namespace Haosf_Social_Proof_Toaster;

class Product_Social_Proof_Toast extends Toast {
	/**
	 * @var \WC_Product
	 */
	private $product;

	public function __construct(\WC_Product $product) {
		$this->product = $product;
		parent::__construct();
	}

	/**
	 * @return \WC_Product
	 */
	public function get_product() {
		return $this->product;
	}
}
