<?php
/**
 *
 * Plugin Name: Vietnam Social Proof Toaster
 * Description: Pop up order details in bottom corner of visitor's screen when they viewing a product page
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
add_action('admin_menu', [Plugin::instance(), 'admin_menu']);
add_action('wp_enqueue_scripts',[Plugin::instance(),'enqueue_styles']);
load_plugin_textdomain( 'haosf', false, plugin_basename( dirname( HAOSF_PLUGIN_BASE ) ) . '/i18n/languages' );
