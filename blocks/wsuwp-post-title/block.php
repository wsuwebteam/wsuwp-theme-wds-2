<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Title extends Block {

	protected static $block_name    = 'wsuwp/post-title';
	protected static $default_attrs = array(
		'className' => '',
		'type'      => 'default',
	);


	public static function render( $attrs, $content = '' ) {

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}

}