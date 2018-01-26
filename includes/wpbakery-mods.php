<?php
/**
 * Enable WPBakery Page Builder for Uncode Content Blocks
 *
 * @since 1.1.7
 */
function joe_ucm_enable_wpbpb_on_uncode_content_block() {

	if( function_exists( 'vc_set_default_editor_post_types' ) ) {

		$list = array(
			'uncodeblock',
		);

		vc_set_default_editor_post_types( $list );

	}

}
add_action( 'vc_after_init', 'joe_ucm_enable_wpbpb_on_uncode_content_block' );
