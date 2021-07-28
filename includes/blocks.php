<?php namespace WSUWP\Theme\WDS;


class Blocks {


	public static function init() {

		Theme::require_class( 'block' );

		$block_dir = get_template_directory() . '/theme-blocks/';

		require_once $block_dir . 'footer-global/block-footer-global.php';
		require_once $block_dir . 'header-global/block-header-global.php';
		require_once $block_dir . 'header-site/block-header-site.php';
		require_once $block_dir . 'navigation-site-vertical/block-navigation-site-vertical.php';

		add_action('init', array( __CLASS__, 'register_blocks' ) );

		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'enqueue_block_editor_assets' ) );

	}


	public static function enqueue_block_editor_assets() {

		wp_enqueue_script(
			'wsuwp-theme-wds-2-blocks',
			get_template_directory_uri() . '/assets/dist/blocks.js',
			[ 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ],
			filemtime( get_template_directory() . '/assets/dist/blocks.js' )
		);
	}


	public static function register_blocks() {

		$blocks = array(
			'wsuwp/header-global'            => 'Block_Header_Global',
			'wsuwp/header-site'              => 'Block_Header_Site',
			'wsuwp/footer-global'            => 'Block_Footer_Global',
			'wsuwp/navigation-site-vertical' => 'Block_Navigation_Site_Vertical',
		);

		foreach ( $blocks as $block => $class ) {

			register_block_type(
				$block,
				array(
					'api_version' => 2,
					'render_callback' => array( __NAMESPACE__ . '\\' . $class, 'render_block' ),
					'editor_script' => 'wsuwp-theme-wds-2-blocks',
				)
			);
		}

	}


}

Blocks::init();