<?php namespace WSUWP\Theme\WDS;


class Customizer {


	public static function init() {

		require_once get_template_directory() . '/customizer/customizer_social.php';
		require_once get_template_directory() . '/customizer/customizer_contact.php';
		require_once get_template_directory() . '/customizer/customizer_global_header.php';
		require_once get_template_directory() . '/customizer/customizer_global_footer.php';
		require_once get_template_directory() . '/customizer/customizer_site_header.php';
		require_once get_template_directory() . '/customizer/customizer_site_footer.php';

		add_action( 'customize_register', array( __CLASS__, 'setup_customizer' ) );

	}

	public static function setup_customizer( $wp_customize ) {

		self::setup_theme_customizer( $wp_customize );

	}


	public static function setup_theme_customizer( $wp_customize ) {

		$customizers = array();

		$social = new Customizer_Social( $wp_customize );
		$contact = new Customizer_Contact( $wp_customize );

		$panel = 'wds_theme_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'WDS Theme Options' ),
				'description' => 'Settings for WSU Web Design System Theme', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

		$customizers[] = new Customizer_Global_Header( $wp_customize, $panel );
		$customizers[] = new Customizer_Global_Footer( $wp_customize, $panel );
		$customizers[] = new Customizer_Site_Header( $wp_customize, $panel );
		$customizers[] = new Customizer_Site_Footer( $wp_customize, $panel );

	}

}

Customizer::init();
