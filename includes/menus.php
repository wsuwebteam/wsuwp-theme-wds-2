<?php namespace WSUWP\Theme\WDS;


class Menus {

	public static function init() {

		Theme::load_class( 'walker-nav-menu-toggle' );

		add_action( 'after_setup_theme', array( __CLASS__, 'register_menus' ), 0 );

	}

	public static function register_menus() {

		register_nav_menus(
			array(
				'site'    => 'Site Navigation',
				'offsite' => 'Offsite Navigation (Footer)',
			)
		);

	}

}

Menus::init();
