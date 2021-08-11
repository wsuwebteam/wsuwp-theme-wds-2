<?php namespace WSUWP\Theme\WDS;


class Customizer {


	public static function init() {

		add_action( 'customize_register', array( __CLASS__, 'setup_customizer' ) );

	}

	public static function setup_customizer( $wp_customize ) {

		self::setup_theme_customizer( $wp_customize );

		self::setup_block_customizer( $wp_customize );

	}


	public static function setup_theme_customizer( $wp_customize ) {

		$panel = 'wds_theme_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'WDS Theme Options' ),
				'description' => 'Settings for WSU Web Design System Theme', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

	}

	public static function setup_block_customizer( $wp_customize ) {

		$blocks = Blocks::get('register_blocks');

		$panel = 'wds_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'Web Design System' ),
				'description' => 'Settings for WSU Web Design System', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

		foreach ( $blocks as $block => $class ) {

			$block_class = __NAMESPACE__ . '\\' . $class;

			call_user_func( array( $block_class, 'customizer' ), $wp_customize, $panel );

		}

	}


}

Customizer::init();
