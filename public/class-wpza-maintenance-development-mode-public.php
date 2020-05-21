<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpza.co.za
 * @since      1.0.0
 *
 * @package    Wpza_Maintenance_Development_Mode
 * @subpackage Wpza_Maintenance_Development_Mode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wpza_Maintenance_Development_Mode
 * @subpackage Wpza_Maintenance_Development_Mode/public
 * @author     Donovan Maidens <info@wpza.co.za>
 */
class Wpza_Maintenance_Development_Mode_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version) {

		$this->plugin_name	 = $plugin_name;
		$this->version		 = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpza_Maintenance_Development_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpza_Maintenance_Development_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/pure-min.css', array(), '2.0.3', 'all');
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wpza-maintenance-development-mode-public.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpza_Maintenance_Development_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpza_Maintenance_Development_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wpza-maintenance-development-mode-public.js', array('jquery'), $this->version, false);
	}

	public function wpza_maintenance_mode() {
		global $pagenow;
		if ($pagenow !== 'wp-login.php' && !current_user_can('manage_options') && !is_admin()) {

			header('HTTP/1.1 Service Unavailable', true, 503);
			header('Content-Type: text/html; charset=utf-8');

			require_once( WP_PLUGIN_DIR . '/' . $this->plugin_name . '/templates/custom-php-file.php' );

			die();
		}
	}

	// add blackout to the whitelist of variables it wordpress knows and allows
// in this case it is the plugin name
//	public function whitelist_query_variable($query_vars) {
//
//		$query_vars[] = $this->plugin_name;
//		return $query_vars;
//	}
//
//// If this is done, we can access it later
//// This example checks very early in the process:
//// if the variable is set, we include our page and stop execution after it
//	public function redirect_to_file(&$wp) {
//
//		if (array_key_exists($this->plugin_name, $wp->query_vars)) {
//
//			switch ($wp->query_vars[$this->plugin_name]) {
//
//				case 'my_value':
//					include( WP_PLUGIN_DIR . '/' . $this->plugin_name . '/templates/custom-php-file.php' );
//					break;
//
//				// ...
//			}
//
//			exit();
//		}
//	}
}
