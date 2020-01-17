<?php

/**
 * Fired during plugin deactivation
 *
 * @link       bitski-uri
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's
 * deactivation.
 *
 * @since      1.0.0
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/includes
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Cpt_Deactivator
{

    /**
     * Unregister custom post types, taxonomies.
     * Flushes rewrite rules afterwards.
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        require_once plugin_dir_path(
                         dirname(__FILE__)
                     ) . 'admin/class-bitski-wp-cpt-admin.php';

        // Unregister the taxonomy & post type, so the rules are no longer in memory
        Bitski_Wp_Cpt_Admin::unregister_taxonomy_type();
        Bitski_Wp_Cpt_Admin::unregister_cpt_task();

        // Remove rewrite rules to delete taxonomy's & post type's rules from the database and then recreate them.
        flush_rewrite_rules();
    }
}
