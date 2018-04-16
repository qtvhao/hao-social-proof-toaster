<?php

namespace Haosf_Social_Proof_Toaster;

class Plugin {
	/**
	 * @var Plugin
	 */
	private static $instance;

	public static function autoload() {
		spl_autoload_register(function($class) {
			if(strpos( $class, 'Haosf_Social_Proof_Toaster') === 0) {
				$class = str_replace( '_', '-', $class);
				$class = str_replace( 'Haosf-Social-Proof-Toaster\\', '', $class);
				$class = strtolower( $class);
				require_once "class-$class.php";
			}
		});
	}

	public function admin_menu() {
		$parent_slug = 'options-general.php';
		$page_title  = __('Vietnam Social Proof Toaster', 'haosf');
		$menu_title  = __('Vietnam Social Proof Toaster', 'haosf');
		$menu_slug   = 'haosf-proof-toaster';
		add_submenu_page( $parent_slug, $page_title, $menu_title, 'manage_options', $menu_slug, [$this, 'setting_page']);

		$parent_slug = 'options-general.php';
		$page_title  = __('About - Social Proof Toaster', 'haosf');
		$menu_title  = __('About - Social Proof Toaster', 'haosf');
		$menu_slug   = 'haosf-proof-toaster-about';
		add_submenu_page( $parent_slug, $page_title, $menu_title, 'manage_options', $menu_slug, [$this, 'about_page']);
	}

	public function setting_page() {
		require_once 'pages/settings.php';
	}

	public function about_page() {
		require_once 'pages/about.php';
	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			do_action( 'haosf_before_instantiate' );
			self::$instance = new self();
			do_action( 'haosf_after_instantiate' );
		}

		return self::$instance;
	}

	public function init_hooks() {
		add_action( 'wp_footer', [ $this, 'render_hidden_toasts' ], 0 );
	}

	public function render_hidden_toasts() {
		$toasts = $this->get_toasts();
		$html   = <<<HTML
<div id="haosf_toasts_wrapper">
    <div id="haosf_toasts_container" class="">
        <div>
            $toasts
        </div>
    </div>
</div>
HTML;
		echo $html;
	}


	public function enqueue_styles() {
		wp_enqueue_style( 'haosf-social-proof-toaster-main-css', HAOSF_ASSETS_URL . 'css/haosf-main.css' );
		do_action('haosf_after_enqueue_styles');
	}

	private function get_toasts() {
		$toasts_html = apply_filters('haosf_default_toasts', '');
		$WC_product  = wc_get_product();
		if ( is_product() and $WC_product instanceof \WC_Product and $this->setting('shown_in_product_page', true)) {
			$product_id     = $WC_product->get_id();
			$product_orders = Helper::get_product_orders( $product_id );
			$total_sales    = Helper::get_total_sales_per_product( $product_id );
			$is_product_ordered = ! empty( $product_orders ) and $product_orders[0] instanceof \WC_Order_Item_Product;
			$is_product_sold = isset( $total_sales->_qty ) and $total_sales->_qty > 0;

			$is_hidden_product_not_sold = $this->setting('hidden_for_product_not_sold_yet', true );
			if ( $is_product_ordered and $is_product_sold ) {
				$toast_html  = new Order_Count_Product_Social_Proof_Toast( $WC_product );
				$toast_html  = apply_filters('haosf_prepare_toast', $toast_html);
				$toasts_html .= $toast_html;
			} else {
				if ( ! $is_hidden_product_not_sold ) {
					$toast_html  = new Order_Count_Product_Social_Proof_Toast( $WC_product );
					$toast_html  = apply_filters('haosf_prepare_toast', $toast_html);
					$toasts_html .= $toast_html;
				}
			}
		}

		return $toasts_html;
	}

	/**
	 * @param string $name
	 * @param bool $default
	 *
	 * @return mixed
	 */
	private function setting($name, $default = false) {
		return get_option( 'haosf_toast_' . $name, $default);
	}
}
