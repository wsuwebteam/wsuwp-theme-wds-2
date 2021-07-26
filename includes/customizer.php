<?php namespace WSUWP\Theme\WDS;


class Customizer {

	public function __construct() {

		// Nothing to see here

	}


	public function init() {

		add_action( 'customize_register', array( $this, 'setup_customizer' ) );

	}

	public function setup_customizer( $wp_customize ) {

		$panel = 'wds_panel';

		$wp_customize->add_panel(
			$panel,
			array(
				'title' => __( 'Web Design System' ),
				'description' => 'Settings for WSU Web Design System', // Include html tags such as <p>.
				'priority' => 160, // Mixed with top-level-section hierarchy.
			)
		);

		Block_Header_Global::customizer( $wp_customize, $panel );
		Block_Footer_Global::customizer( $wp_customize, $panel );
		Block_Navigation_Site_Vertical::customizer( $wp_customize, $panel );

	}


}

(new Customizer)->init();