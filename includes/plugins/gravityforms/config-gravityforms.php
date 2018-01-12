<?php
/**
 * Gravity Forms Modifications
 */

/* Styles
==============================================================================*/

/**
 * Load custom CSS
 */
function joe_ucm_gravityforms_enqueue_styles() {

	$pluginbase = basename( __DIR__ );
	$handle     = JOE_UCM_PREFIX . '-' . $pluginbase;
	$deps       = array();

	// If Gravity Forms built-in styles are enabled
	if ( ! get_option( 'rg_gforms_disable_css' ) ) {

		$deps = array( 'gforms_reset_css', 'gforms_formsmain_css', 'gforms_ready_class_css', 'gforms_browsers_css' );

	}

	wp_register_style( $handle, plugin_dir_url( __FILE__ ) . 'css/' . $pluginbase . '-mods.css', $deps, JOE_UCM_VER );
	wp_enqueue_style( $handle );

}
add_action( 'wp_enqueue_scripts', 'joe_ucm_gravityforms_enqueue_styles' );