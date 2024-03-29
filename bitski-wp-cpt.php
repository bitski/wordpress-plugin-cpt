<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, registers the activation and deactivation functions, and defines
 * a function that starts the plugin.
 *
 * @link              bitski-uri
 * @since             1.0.0
 * @package           Bitski_Wp_Cpt
 *
 * @wordpress-plugin
 * Plugin Name:       Bitski WP CPT
 * Plugin URI:        test-uri
 * Description:       This plugin registers a custom 1. post type & 2. taxonomy.
 * Version:           1.0.0
 * Author:            bitski
 * Author URI:        bitski-uri
 * License:           GPL-2.0+ License
 * URI:               http://www.gnu.org/licenses/gpl-2.0.txt Text
 * Domain:            bitski-wp-cpt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BITSKI_WP_CPT_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bitski-wp-cpt-activator.php
 */
function activate_bitski_wp_cpt()
{
    require_once plugin_dir_path(
                     __FILE__
                 ) . 'includes/class-bitski-wp-cpt-activator.php';
    Bitski_Wp_Cpt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bitski-wp-cpt-deactivator.php
 */
function deactivate_bitski_wp_cpt()
{
    require_once plugin_dir_path(
                     __FILE__
                 ) . 'includes/class-bitski-wp-cpt-deactivator.php';
    Bitski_Wp_Cpt_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_bitski_wp_cpt');
register_deactivation_hook(__FILE__, 'deactivate_bitski_wp_cpt');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-bitski-wp-cpt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bitski_wp_cpt()
{
    $plugin = new Bitski_Wp_Cpt();
    $plugin->run();
}

run_bitski_wp_cpt();
