<?php
/*
* Plugin Name: Custom Login Form and Logout Redirect
* Plugin URI: https://mysteriousteam.com/wordpress-login-form-and-logout-redirect/
* Description: Create a login form for use anywhere (Post, Page, Custom Post Type,...) and Logout Redirect custom within WordPress.
* Version: 1.0.0
* Author: tony199x
* Author URI: https://mysteriousteam.com
* Text Domain: mst-login-form-and-logout-redirect
* Domain Path: /languages
*/
namespace mysterious\loginform_logout;
if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '/autoload.php';
define('MST_LOGIN_LOGOUT', __FILE__);
define('MST_LOGIN_LOGOUT_VERSION', '1.0.0' );
define('MST_LOGIN_LOGOUT_DIR', realpath(plugin_dir_path( __FILE__ ))  );
define('MST_LOGIN_LOGOUT_URL', plugin_dir_url( __FILE__ ) );
function plugins_loaded() {
	classes\init::instance();
	load_plugin_textdomain( 'mst-login-form-and-logout-redirect', false, basename( __DIR__ ) . '/languages/' );
}
add_action('plugins_loaded', 'mysterious\\loginform_logout\\plugins_loaded');
register_activation_hook(__FILE__, array('mysterious\\loginform_logout\\classes\\plugin', 'activate'));