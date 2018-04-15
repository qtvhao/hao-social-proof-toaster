<?php
/**
 *
 * Plugin Name: Vietnam Social Proof Toaster
 * Plugin URI: https://github.com/qtvhao/social-proof-toaster
 * Author: Hao Nghiem
 * Version: 1.0.0
 * Author URI: https://www.linkedin.com/in/hào-nghiêm-xuân-b61a60106/
 * Text Domain: haosf
 * License: GPLv3
 */

/*
* Init the plugin
*/

use Haosf_Social_Proof_Toaster\Plugin;

define( 'HAOSF_VERSION', '1.0.0' );

define( 'HAOSF__FILE__', __FILE__ );
define( 'HAOSF_PLUGIN_BASE', plugin_basename( HAOSF__FILE__ ) );
define( 'HAOSF_PATH', plugin_dir_path( HAOSF__FILE__ ) );

define( 'HAOSF_URL', plugins_url( '/', HAOSF__FILE__ ) );
define( 'HAOSF_ASSETS_URL', HAOSF_URL . 'assets/' );

require_once 'includes/class-plugin.php';
Plugin::autoload();
add_action('init', [Plugin::instance(), 'init_hooks']);
add_action('wp_enqueue_scripts',[Plugin::instance(),'enqueue_styles']);

/*
* functions for echoing the HTML
*/
function haosf_footer() {
	$set = ['','set2','set3','set4'][rand(1,4)];
	$randomSlug = rand(1,100);
	$imageSource = "https://robohash.org/$randomSlug.png?size=100x100&set=$set";
	$toastContent = <<<HTML
<div class="haosf_toast_container_side_image">
    <img class="" src="$imageSource">
</div>
<div class="haosf_toast_wrapper_heading">
    <div class="haosf_toast_container_heading">
        <div class="haosf_toast_person"><span class="haosf_toast_person_name">Arun</span> from <span
                class="haosf_toast_person_address">New Delhi, DL</span></div>
        <div class="haosf_toast_message">Recently signed up for Proof</div>
        <div class="haosf_toast_time_diff">2 hours ago</div>
    </div>
</div>
<div class="haosf_toast_button_close_wrapper">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"></path>
    </svg>
</div>
HTML;
	$toasts = <<<HTML
<div id="haosf_toast_wrapper_1997">
    <div class="haosf_toast_container haosf_slideInUp">
        $toastContent
    </div>
</div>
HTML;
	$html = <<<HTML
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
