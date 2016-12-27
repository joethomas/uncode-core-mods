<?php
/**
 * Customize admin bar items
 *
 * @link http://www.paulund.co.uk/how-to-remove-links-from-wordpress-admin-bar/
 * @since 1.1.2
 */
function joe_ucm_remove_admin_bar_uncode_help() {

	global $wp_admin_bar;

	$wp_admin_bar->remove_menu( 'uncode-help' ); // Uncode Help menu

}
add_action( 'wp_before_admin_bar_render', 'joe_ucm_remove_admin_bar_uncode_help', 999 );