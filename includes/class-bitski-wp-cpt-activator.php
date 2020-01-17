<?php

/**
 * Fired during plugin activation
 *
 * @link       bitski-uri
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Cpt_Activator
{

    /**
     * Declare custom post types, taxonomies and plugin settings.
     * Flushes rewrite rules afterwards.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        require_once plugin_dir_path(
                         dirname(__FILE__)
                     ) . 'admin/class-bitski-wp-cpt-admin.php';

        // Create taxonomy before cpt to make the taxonomy's rewrite work
        Bitski_Wp_Cpt_Admin::new_taxonomy_type();
        Bitski_Wp_Cpt_Admin::new_cpt_task();

        // Remove rewrite rules and then recreate them.
        flush_rewrite_rules();
    }
}
