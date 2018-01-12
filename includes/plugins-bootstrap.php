<?php
/* Plugins Check
==============================================================================*/

function joe_ucm_plugins_check() {

	// Set constants for active third party plugins
	define( 'JOE_UCM_GRAVITY_FORMS_ACTIVE', class_exists( 'RGForms' ) );

	// Bootstrap third party plugin modification files
	joe_ucm_plugins_bootstrap();

}
add_action( 'plugins_loaded', 'joe_ucm_plugins_check' );


/* Plugin Mods Bootstrap
==============================================================================*/

function joe_ucm_plugins_bootstrap() {

	// Gravity Forms
	if ( JOE_UCM_GRAVITY_FORMS_ACTIVE ) {
		require_once( 'plugins/gravityforms/config-gravityforms.php' );
	}

}