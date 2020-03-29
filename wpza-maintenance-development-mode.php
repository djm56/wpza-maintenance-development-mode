<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpza.co.za
 * @since             1.0.0
 * @package           Wpza_Maintenance_Development_Mode
 *
 * @wordpress-plugin
 * Plugin Name:       Maintenance and Development Mode
 * Plugin URI:        https://wpza.co.za
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Donovan Maidens
 * Author URI:        https://wpza.co.za
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpza-maintenance-development-mode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPZA_MAINTENANCE_DEVELOPMENT_MODE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpza-maintenance-development-mode-activator.php
 */
function activate_wpza_maintenance_development_mode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpza-maintenance-development-mode-activator.php';
	Wpza_Maintenance_Development_Mode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpza-maintenance-development-mode-deactivator.php
 */
function deactivate_wpza_maintenance_development_mode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpza-maintenance-development-mode-deactivator.php';
	Wpza_Maintenance_Development_Mode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpza_maintenance_development_mode' );
register_deactivation_hook( __FILE__, 'deactivate_wpza_maintenance_development_mode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpza-maintenance-development-mode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpza_maintenance_development_mode() {

	$plugin = new Wpza_Maintenance_Development_Mode();
	$plugin->run();

}
run_wpza_maintenance_development_mode();
