<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Pagination extends Block {

	protected static $block_name    = 'wsuwp/pagination';
	protected static $default_attrs = array(
		'className' => '',
		'type'      => 'default',
		'style'     => '',
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-pagination';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-pagination--', 'style', $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}

}