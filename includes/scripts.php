<?php
/**
 * Load styles on frontend.
 *
 * @since 1.0.0
 */

function joe_ucm_enqueue_styles() {

	global $post;

	$production_mode   = ot_get_option( '_uncode_production' );
	$resources_version = ( $production_mode === 'on' ) ? JOE_UCM_VER : rand();
	$deps              = array( 'uncode-style', 'uncode-custom-style' );

	wp_register_style( 'uncode-core-mods', plugin_dir_url( __FILE__ ) . 'css/uncode-core-mods.css', $deps, $resources_version );
	wp_enqueue_style( 'uncode-core-mods' );

}
add_action( 'wp_enqueue_scripts', 'joe_ucm_enqueue_styles' );

/**
 * Load styles in WP Admin.
 *
 * @since 1.0.0
 */
function joe_ucm_enqueue_admin_styles() {

	global $post;

	$production_mode   = ot_get_option( '_uncode_production' );
	$resources_version = ( $production_mode === 'on' ) ? JOE_UCM_VER : rand();
	$deps              = array();

	wp_register_style( 'uncode-core-mods-admin', plugin_dir_url( __FILE__ ) . 'css/uncode-core-mods-admin.css', $deps, $resources_version );
	wp_enqueue_style( 'uncode-core-mods-admin' );

}
//add_action( 'admin_enqueue_scripts', 'joe_ucm_enqueue_admin_styles' );