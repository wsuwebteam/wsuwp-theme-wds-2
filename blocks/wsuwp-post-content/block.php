<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Content extends Block {

	protected static $block_name    = 'wsuwp/post-content';
	protected static $default_attrs = array(
		'className' => '',
	);


	public static function render( $attrs, $content = '' ) {

		ob_start();

		the_content();

		return ob_get_clean();

	}

}