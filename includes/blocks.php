<?php namespace WSUWP\Theme\WDS;

class Blocks {


	protected static $register_blocks = array(
		'wsuwp/header-global'            => 'Block_WSUWP_Header_Global',
		'wsuwp/header-site'              => 'Block_WSUWP_Header_Site',
		'wsuwp/navigation-site-vertical' => 'Block_WSUWP_Navigation_Site_Vertical',
		'wsuwp/footer-global'            => 'Block_WSUWP_Footer_Global',
		'wsuwp/footer-site'              => 'Block_WSUWP_Footer_Site',
		'wsuwp/post-layout'              => 'Block_WSUWP_Post_Layout',
		'wsuwp/post-query'               => 'Block_WSUWP_Post_Query',
		'wsuwp/post-article'             => 'Block_WSUWP_Post_Article',
		'wsuwp/post-article-copy'        => 'Block_WSUWP_Post_Article_Copy',
		'wsuwp/post-content'             => 'Block_WSUWP_Post_Content',
		'wsuwp/post-header'              => 'Block_WSUWP_Post_Header',
		'wsuwp/post-title'               => 'Block_WSUWP_Post_Title',
		'wsuwp/post-byline'              => 'Block_WSUWP_Post_Byline',
		'wsuwp/post-date'                => 'Block_WSUWP_Post_Date',
		'wsuwp/post-footer'              => 'Block_WSUWP_Post_Footer',
		'wsuwp/post-tags'                => 'Block_WSUWP_Post_Tags',
		'wsuwp/post-categories'          => 'Block_WSUWP_Post_Categories',
		'wsuwp/post-hero'                => 'Block_WSUWP_Post_Hero',
		'wsuwp/post-social'              => 'Block_WSUWP_Post_Social',
		'wsuwp/post-image'               => 'Block_WSUWP_Post_Image',
		'wsuwp/post-excerpt'             => 'Block_WSUWP_Post_Excerpt',
		'wsuwp/pagination'               => 'Block_WSUWP_Pagination',
	);

	
	public static function get( $property ) {

		switch ( $property ) {

			case 'register_blocks':
				return self::$register_blocks;

			default:
				return '';
		}

	}


	public static function setup_classes() {

		Theme::load_class( 'block' );

	}


	public static function init() {

		self::setup_classes();

		add_action( 'init', array( __CLASS__, 'register' ) );

	}


	public static function register() {

		// Get blocks to register
		$blocks = self::$register_blocks;

		// Get the block directory
		$block_dir = get_template_directory() . '/blocks/';

		foreach ( $blocks as $block => $class ) {

			// folder name should be the block name with the / replaced with - (i.e. wsuwp/name -> wsupw-name)
			$block_folder = str_replace( '/', '-', $block );

			$block_class = __NAMESPACE__ . '\\' . $class;

			require_once $block_dir . $block_folder . '/block.php';

			// A block should declare an init method if it needs to add filters, hooks, scripts, or other WP assets.
			if ( method_exists( $block_class, 'init' ) ) {

				call_user_func( array( $block_class, 'init' ) );

			}

			// Call get('register_block') to check if the block should be registered, default is true in class-block.php 
			if ( call_user_func( array( $block_class, 'get' ), 'register_block' ) ) {

				register_block_type(
					$block,
					array(
						'api_version'     => 2,
						'render_callback' => array( $block_class, 'render_block' ),
						'editor_script'   => 'wsuwp-theme-wds-2-blocks',
					)
				);
			}
		}
	}

}

Blocks::init();


/*class Blocks {


	public static function init() {

		Theme::require_class( 'block' );

		$block_dir = get_template_directory() . '/theme-blocks/';

		require_once $block_dir . 'article/block-article.php';
		require_once $block_dir . 'article-caption/block-article-caption.php';
		require_once $block_dir . 'article-categories/block-article-categories.php';
		require_once $block_dir . 'article-content/block-article-content.php';
		require_once $block_dir . 'article-header/block-article-header.php';
		require_once $block_dir . 'article-hero/block-article-hero.php';
		require_once $block_dir . 'article-image/block-article-image.php';
		require_once $block_dir . 'article-meta-byline/block-article-meta-byline.php';
		require_once $block_dir . 'article-meta-date/block-article-meta-date.php';
		require_once $block_dir . 'article-social/block-article-social.php';
		require_once $block_dir . 'article-tags/block-article-tags.php';
		require_once $block_dir . 'article-title/block-article-title.php';
		require_once $block_dir . 'footer-article/block-footer-article.php';
		require_once $block_dir . 'footer-global/block-footer-global.php';
		require_once $block_dir . 'header-global/block-header-global.php';
		require_once $block_dir . 'header-site/block-header-site.php';
		require_once $block_dir . 'navigation-site-vertical/block-navigation-site-vertical.php';
		require_once $block_dir . 'title-page/block-title-page.php';

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
			'wsuwp/article'                  => 'Block_Article',
			'wsuwp/article-caption'          => 'Block_Article_Caption',
			'wsuwp/article-categories'       => 'Block_Article_Categories',
			'wsuwp/article-content'          => 'Block_Article_Content',
			'wsuwp/article-header'           => 'Block_Article_Header',
			'wsuwp/article-hero'             => 'Block_Article_Hero',
			'wsuwp/article-image'            => 'Block_Article_Image',
			'wsuwp/article-meta-byline'      => 'Block_Article_Meta_Byline',
			'wsuwp/article-meta-date'        => 'Block_Article_Meta_Date',
			'wsuwp/article-social'           => 'Block_Article_Social',
			'wsuwp/article-tags'             => 'Block_Article_Tags',
			'wsuwp/article-title'            => 'Block_Article_Title',
			'wsuwp/header-global'            => 'Block_Header_Global',
			'wsuwp/header-site'              => 'Block_Header_Site',
			'wsuwp/footer-article'           => 'Block_Footer_Article',
			'wsuwp/footer-global'            => 'Block_Footer_Global',
			'wsuwp/navigation-site-vertical' => 'Block_Navigation_Site_Vertical',
			'wsuwp/title-page'               => 'Block_Title_Page',
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

Blocks::init();*/