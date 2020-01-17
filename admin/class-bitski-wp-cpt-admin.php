<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       bitski-uri
 * @since      1.0.0
 *
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bitski_Wp_Cpt
 * @subpackage Bitski_Wp_Cpt/admin
 * @author     bitski <bitski-email>
 */
class Bitski_Wp_Cpt_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param  string  $plugin_name  The name of this plugin.
     * @param  string  $version  The version of this plugin.
     *
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Bitski_Wp_Cpt_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Bitski_Wp_Cpt_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style(
            $this->plugin_name,
            plugin_dir_url(
                __FILE__
            ) . 'css/bitski-wp-cpt-admin.css',
            [],
            $this->version,
            'all'
        );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Bitski_Wp_Cpt_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Bitski_Wp_Cpt_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script(
            $this->plugin_name,
            plugin_dir_url(
                __FILE__
            ) . 'js/bitski-wp-cpt-admin.js',
            ['jquery'],
            $this->version,
            false
        );
    }

    /**
     * Creates a new custom post type 'task'.
     *
     * @since    1.0.0
     */
    public static function new_cpt_task()
    {
        $cpt_name = 'task';

        $labels = [
            'name'                  => __(
                'To-Do List',
                'Post type general name',
                'textdomain'
            ),
            'singular_name'         => _x(
                'Task',
                'Post type singular name',
                'textdomain'
            ),
            'menu_name'             => _x(
                'To-Do List',
                'Admin Menu text',
                'textdomain'
            ),
            'name_admin_bar'        => _x(
                'Book2',
                'Add New on Toolbar',
                'textdomain'
            ),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New Task', 'textdomain'),
            'new_item'              => __('New Task', 'textdomain'),
            'edit_item'             => __('Edit Task', 'textdomain'),
            'view_item'             => __('View Task', 'textdomain'),
            'all_items'             => __('All Tasks', 'textdomain'),
            'search_items'          => __('Search Tasks', 'textdomain'),
            'parent_item_colon'     => __('Parent Tasks:', 'textdomain'),
            'not_found'             => __('No tasks found.', 'textdomain'),
            'not_found_in_trash'    => __(
                'No tasks found in Trash.',
                'textdomain'
            ),
            'featured_image'        => _x(
                'Task Featured Image',
                'Overrides the “Featured Image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'set_featured_image'    => _x(
                'Set Task featured image',
                'Overrides the “Set featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'remove_featured_image' => _x(
                'Remove Task featured image',
                'Overrides the “Remove featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'use_featured_image'    => _x(
                'Use as Task featured image',
                'Overrides the “Use as featured image” phrase for this post type. Added in 4.3',
                'textdomain'
            ),
            'archives'              => _x(
                'Task archives',
                'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4',
                'textdomain'
            ),
            'insert_into_item'      => _x(
                'Insert into task',
                'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4',
                'textdomain'
            ),
            'uploaded_to_this_item' => _x(
                'Uploaded to this task',
                'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4',
                'textdomain'
            ),
            'filter_items_list'     => _x(
                'Filter tasks list',
                'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4',
                'textdomain'
            ),
            'items_list_navigation' => _x(
                'Tasks list navigation',
                'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4',
                'textdomain'
            ),
            'items_list'            => _x(
                'Tasks list',
                'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4',
                'textdomain'
            ),
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'task'],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-calendar-alt',
            'taxonomies'         => [],
            'supports'           => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
            ],
        ];

        register_post_type($cpt_name, $args);
    }


    /**
     * Creates a new taxonomy 'type' for a custom post type 'task'.
     *
     * @since    1.0.0
     */
    public static function new_taxonomy_type()
    {
        $tax_name = 'type';

        $labels = [
            'name'              => _x('Types', 'taxonomy general name'),
            'singular_name'     => _x('Type', 'taxonomy singular name'),
            'search_items'      => __('Search Types'),
            'all_items'         => __('All Types'),
            'parent_item'       => __('Parent Type'),
            'parent_item_colon' => __('Parent Type:'),
            'edit_item'         => __('Edit Type'),
            'update_item'       => __('Update Type'),
            'add_new_item'      => __('Add New Type'),
            'new_item_name'     => __('New Type Name'),
            'menu_name'         => __('Types'),
        ];

        register_taxonomy(
            $tax_name,
            'task',
            [
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => ['slug' => 'task/type'],
            ]
        );
    }


    /**
     * Unregister custom post type 'task'.
     *
     * @since    1.0.0
     */
    public static function unregister_cpt_task()
    {
        unregister_post_type('task');
    }


    /**
     * Unregister custom taxonomy 'type'.
     *
     * @since    1.0.0
     */
    public static function unregister_taxonomy_type()
    {
        unregister_taxonomy('type');
    }
}
