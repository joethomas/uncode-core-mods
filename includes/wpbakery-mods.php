<?php
/**
 * Enable WPBakery Page Builder for custom post types, since the WPBakery Role Editor settings are not sticking.
 *
 * @since 1.1.9
 */
function joe_ucm_enable_wpbpb_on_uncode_content_block() {

	if( function_exists( 'vc_set_default_editor_post_types' ) ) {

		$list = array(
			'page',
			'post',
			'uncodeblock',
			'shopify_product',
			'influencer',
			'deal',
		);

		vc_set_default_editor_post_types( $list );

	}

}
add_action( 'vc_after_init', 'joe_ucm_enable_wpbpb_on_uncode_content_block' );
