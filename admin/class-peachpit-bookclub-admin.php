<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://saragiven.com
 * @since      1.0.0
 *
 * @package    Peachpit_Bookclub
 * @subpackage Peachpit_Bookclub/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Peachpit_Bookclub
 * @subpackage Peachpit_Bookclub/admin
 * @author     Sara Given <sara@saragiven.com>
 */
class Peachpit_Bookclub_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Peachpit_Bookclub_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Peachpit_Bookclub_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Peachpit_Bookclub_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Peachpit_Bookclub_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	* Creates a new custom post type
	*
	* @since 1.0.0
	* @access public
	* @uses register_post_type()
	*/
	public static function new_cpt_pp_book() {
		$cap_type = 'post';
		$plural = 'Books';
		$single = 'Book';
		$cpt_name = 'pp_book';
		$opts['can_export'] = TRUE;
		$opts['capability_type'] = $cap_type;
		$opts['description'] = '';
		$opts['exclude_from_search'] = FALSE;
		$opts['has_archive'] = TRUE;
		$opts['hierarchical'] = FALSE;
		$opts['map_meta_cap'] = TRUE;
		$opts['menu_icon'] = 'dashicons-businessman';
		$opts['menu_position'] = 25;
		$opts['public'] = TRUE;
		$opts['publicly_querable'] = TRUE;
		$opts['query_var'] = TRUE;
		$opts['register_meta_box_cb'] = '';
		$opts['rewrite'] = FALSE;
		$opts['show_in_admin_bar'] = TRUE;
		$opts['show_in_menu'] = TRUE;
		$opts['show_in_nav_menu'] = TRUE;
		$opts['show_in_graphql'] = TRUE;
		$opts['graphql_single_name'] = $single;
		$opts['graphql_plural_name'] = $plural;
		$opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'default' );
		$opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'default' );
		$opts['labels']['all_items'] = esc_html__( $plural, 'default' );
		$opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'default' );
		$opts['labels']['menu_name'] = esc_html__( $plural, 'default' );
		$opts['labels']['name'] = esc_html__( $plural, 'default' );
		$opts['labels']['name_admin_bar'] = esc_html__( $single, 'default' );
		$opts['labels']['new_item'] = esc_html__( "New {$single}", 'default' );
		$opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'default' );
		$opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'default' );
		$opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'default' );
		$opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'default' );
		$opts['labels']['singular_name'] = esc_html__( $single, 'default' );
		$opts['labels']['view_item'] = esc_html__( "View {$single}", 'default' );
		register_post_type( strtolower( $cpt_name ), $opts );
	} 

	/**
	 * Using ACF Plugin function, create custom fields for book post type
	 */

	public static function add_pp_book_custom_fields() {

		$post_type = 'pp_book';

		acf_add_local_field_group(array(
			'key' => 'group_1',
			'title' => 'Book Info',
			'fields' => array (
				array (
					'key' => 'field_1',
					'label' => 'Author',
					'name' => 'pp_author',
					'type' => 'text',
				),
				array (
					'key' => 'field_2',
					'label' => 'Cover Image',
					'name' => 'pp_cover_uri',
					'type' => 'url'
				),
				array (
					'key' => 'field_3',
					'label' => 'Book Club Date',
					'name' => 'pp_book_date',
					'type' => 'date_picker',
					'display_format' => 'd/m/Y',
    				'return_format' => 'd/m/Y',
    				'first_day' => 1,
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => $post_type,
					),
				),
			),
			'position' => 'acf_after_title'
		));
	}
}
