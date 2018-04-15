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

	protected function get_image() {
		return $this->product->get_image();
	}

	protected function get_heading() {
		return <<<HTML
		<div class="haosf_toast_person">{$this->product->get_name()}</div>
        <div class="haosf_toast_message">Recently signed up for Proof</div>
        <div class="haosf_toast_time_diff">2 hours ago</div>
HTML;
	}

}
