<?php
/*
	Plugin Name: Uncode Core Mods
	Description: This plugin contains useful modifications for Uncode theme by Undsgn.
	Plugin URI: https://github.com/joethomas/uncode-core-mods
	Version: 1.1.5
	Author: Joe Thomas
	Author URI: https://github.com/joethomas
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: uncode-core-mods
	Domain Path: /languages/

	GitHub Plugin URI: https://github.com/joethomas/uncode-core-mods
	GitHub Branch: master
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;


/* Global Variables & Constants
==============================================================================*/

/**
 * Define the constants for use within the plugin
 */

// Plugin
function joe_ucm_get_plugin_data_version() {
	$plugin = get_plugin_data( __FILE__, false, false );

	define( 'JOE_UCM_VER', $plugin['Version'] );
	define( 'JOE_UCM_TEXTDOMAIN', $plugin['TextDomain'] );
	define( 'JOE_UCM_NAME', $plugin['Name'] );
}
add_action( 'init', 'joe_ucm_get_plugin_data_version' );

define( 'JOE_UCM_PREFIX', 'uncode-core-mods' );


/* Bootstrap
==============================================================================*/

require_once( 'includes/scripts.php' ); // controls CSS and JS
require_once( 'includes/updates.php' ); // controls plugin updates


/* Languages
==============================================================================*/

/**
 * Load text domain for plugin translations
 */
function joe_ucm_load_textdomain() {
	load_plugin_textdomain( 'uncode-core-mods', false, basename( __DIR__ ) . '/languages/' );
}
add_action( 'plugins_loaded', 'joe_ucm_load_textdomain' );

