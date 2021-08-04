<?php namespace WSUWP\Theme\WDS;


class Blocks {


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