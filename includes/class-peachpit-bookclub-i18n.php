<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://saragiven.com
 * @since      1.0.0
 *
 * @package    Peachpit_Bookclub
 * @subpackage Peachpit_Bookclub/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Peachpit_Bookclub
 * @subpackage Peachpit_Bookclub/includes
 * @author     Sara Given <sara@saragiven.com>
 */
class Peachpit_Bookclub_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'peachpit-bookclub',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
