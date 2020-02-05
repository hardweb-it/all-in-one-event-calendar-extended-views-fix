<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hardweb.it/
 * @since             0.1
 * @package           all-in-one-event-calendar-extended-views-fix
 *
 * @wordpress-plugin
 * Plugin Name:       All-in-One Event Calendar Extended Views FIX
 * Description:       Dynamically re-enable the plugin if it's disabled.
 * Version:           0.2
 * Author:            Hardweb.it
 * Author URI:        https://hardweb.it/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       all-in-one-event-calendar-extended-views-fix
 */
 
 // If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

#FIX AIO Event Calendar Extended Views automatically disable itself

if (!is_admin()) {
	add_action('plugins_loaded', 'hw_fix_aioecev_disable');
	function hw_fix_aioecev_disable() {
		hw_fix_aioecev_enable_extension();
	}
} else {
	add_action('muplugins_loaded','hw_fix_aioecev_disable_extension');
	add_action('save_post','hw_fix_aioecev_enable_extension');
}

function hw_fix_aioecev_enable_extension() {
	if ( !is_plugin_active( 'all-in-one-event-calendar-extended-views/all-in-one-event-calendar-extended-views.php' ) ) {
		activate_plugin('all-in-one-event-calendar-extended-views/all-in-one-event-calendar-extended-views.php');
	}
}

function hw_fix_aioecev_disable_extension() {
	if ( is_plugin_active( 'all-in-one-event-calendar-extended-views/all-in-one-event-calendar-extended-views.php' ) ) {
		deactivate_plugins('all-in-one-event-calendar-extended-views/all-in-one-event-calendar-extended-views.php');
	}
}
?>