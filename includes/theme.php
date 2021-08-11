<?php namespace WSUWP\Theme\WDS;


class Theme {


	protected static $version = '0.0.1';


	public static function get( $property ) {

		switch ( $property ) {
			case 'version':
				return self::$version;
			default:
				return '';
		}

	}


	public static function init() {

		self::load_class( 'query' );

		//require_once __DIR__ . '/include-options.php';
		//require_once __DIR__ . '/include-theme-config.php';
		//require_once __DIR__ . '/include-menus.php';
		//require_once __DIR__ . '/include-media.php';
        require_once __DIR__ . '/templates.php';
		require_once __DIR__ . '/scripts.php';
        require_once __DIR__ . '/blocks.php';
        require_once __DIR__ . '/customizer.php';
        require_once __DIR__ . '/menus.php';
		require_once __DIR__ . '/supports.php';
		//require_once __DIR__ . '/customizer/include-customizer.php';
		//require_once __DIR__ . '/include-sidebars.php';
		//require_once __DIR__ . '/include-blocks.php';
		//require_once __DIR__ . '/include-body-classes.php';
		//require_once __DIR__ . '/include-rest-api.php';

	}


	public static function load_class( $class_slug ) {

		require_once get_template_directory() . '/classes/class-' . $class_slug . '.php';

	}

}

Theme::init();
