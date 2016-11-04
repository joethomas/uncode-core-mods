<?php
/**
 * Check for activated dependency before allowing plugin to activate.
 */
function joeucmods_parent_plugin_check() {

	// If parent plugin is not active
	if ( current_user_can( 'activate_plugins' ) && ! class_exists( 'UncodeCore_Plugin' ) ) {

		add_action( 'admin_init', 'joeucmods_deactivate' );
		add_action( 'admin_notices', 'joeucmods_activation_error' );

		function joeucmods_deactivate() {
			deactivate_plugins( JOEUCMODS_BASENAME_FILE );
		}

		function joeucmods_activation_error() {

			//echo "<div class='notice notice-warning is-dismissible'><p>Message to be shown</p></div>";
			$class = 'notice notice-error is-dismissible';
			$child_plugin = JOEUCMODS_NAME;
			$parent_plugin = JOEUCMODS_PARENT;

			echo sprintf(
				__( '%s%s%s requires %s%s%s to work properly. For now, %2$s has been deactivated.%s%sBegin Installing %5$s%s%s%4$sNote:%6$s After %5$s installation and activation, return here to activate %2$s%s', 'uncode-core-mods' ),
				'<div class="' . $class . '"><p><strong>',
				esc_html( $child_plugin ),
				'</strong>',
				'<strong>',
				esc_html( $parent_plugin ),
				'</strong>',
				'</p><p>',
				'<a class="button button-primary" href="admin.php?page=uncode-plugins">',
				' &rarr;</a>',
				'</p><hr style="margin: 15px 0 10px;"><p style="color: #aaa;"><small>',
				'</small></p></div>'
			);

			if ( isset( $_GET['activate'] ) )
				unset( $_GET['activate'] );

		}

	}

}
add_action( 'plugins_loaded', 'joeucmods_parent_plugin_check' );
