<?php
/*
	Plugin Name: Uncode Core Mods
	Description: This plugin contains useful modifications for Uncode theme by Undsgn.
	Plugin URI: http://joethomas.co
	Version: 1.0.2
	Author: Joe Thomas
	Author URI: http://joethomas.co
	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
	Text Domain: uncode-core-mods
	Domain Path: /languages/
*/

// Prevent direct file access
defined( 'ABSPATH' ) or exit;


/* Setup Plugin
==============================================================================*/

/**
 * Define the constants for use within the plugin
 */

// Plugin
define( 'JOEUCMODS_VER', '1.0.2' );
define( 'JOEUCMODS_PREFIX', 'uncode-core-mods' );
define( 'JOEUCMODS_NAME', __( 'Uncode Core Mods', 'uncode-core-mods' ) );

// Plugin basename
define( 'JOEUCMODS_BASENAME', plugin_basename(__DIR__) );
define( 'JOEUCMODS_BASENAME_FILE', plugin_basename(__FILE__) );

// Plugin dependency
define( 'JOEUCMODS_PARENT', __( 'Uncode Core', 'uncode-core-mods' ) );

// Plugin paths
define( 'JOEUCMODS_DIR', untrailingslashit( plugin_dir_path(__FILE__) ) );
define( 'JOEUCMODS_DIR_URI', untrailingslashit( plugin_dir_url(__FILE__) ) );

// Plugin directory paths
define( 'JOEUCMODS_INC_DIR', JOEUCMODS_DIR . '/includes' );
define( 'JOEUCMODS_INC_DIR_URI', JOEUCMODS_DIR_URI . '/includes' );

define( 'JOEUCMODS_LIB_DIR', JOEUCMODS_DIR . '/library' );
define( 'JOEUCMODS_LIB_DIR_URI', JOEUCMODS_DIR_URI . '/library' );


/* Styles
==============================================================================*/

/**
 * Load CSS on Frontend
 */
function joeucmods_enqueue_styles() {

	global $post;

	$production_mode   = ot_get_option( '_uncode_production' );
	$resources_version = ( $production_mode === 'on' ) ? null : rand();
	$deps              = array( 'uncode-style', 'uncode-custom-style' );

	wp_register_style( JOEUCMODS_PREFIX, JOEUCMODS_LIB_DIR_URI . '/css/' . JOEUCMODS_PREFIX . '.css', $deps, $resources_version );
	wp_enqueue_style( JOEUCMODS_PREFIX );

}
add_action( 'wp_enqueue_scripts', 'joeucmods_enqueue_styles' );

/**
 * Load CSS in Admin
 */
function joeucmods_enqueue_admin_styles() {

	global $post;
	
	$production_mode   = ot_get_option( '_uncode_production' );
	$resources_version = ( $production_mode === 'on' ) ? null : rand();
	$deps              = array();

	wp_register_style( JOEUCMODS_PREFIX . '-admin', JOEUCMODS_LIB_DIR_URI . '/css/' . JOEUCMODS_PREFIX . '-admin.css', $deps, $resources_version );
	wp_enqueue_style( JOEUCMODS_PREFIX . '-admin' );

}
add_action( 'admin_enqueue_scripts', 'joeucmods_enqueue_admin_styles' );


/* Bootstrap Files
==============================================================================*/

// Plugin activation/deactivation
//require_once( JOEUCMODS_INC_DIR . '/plugin-check.php' );

// Plugin updates
require_once( JOEUCMODS_INC_DIR . '/updates.php' );


/* Languages
==============================================================================*/

/**
 * Load text domain for plugin translations
 */
function joeucmods_load_textdomain() {
	load_plugin_textdomain( 'uncode-core-mods', FALSE, basename(__DIR__) . '/languages/' );
}
add_action( 'plugins_loaded', 'joeucmods_load_textdomain' );

