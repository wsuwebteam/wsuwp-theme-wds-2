<?php namespace WSUWP\Theme\WDS;


class Block_Navigation_Site_Vertical extends Block {

	protected static $block_name    = 'wsuwp/navigation-site-vertical';
	protected static $default_attrs = array(
		'show' => array(
			'default' => true,
			'setting' => 'wsuwp_wds_component_navigation_site_vertical_show',
		),
		'style' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_navigation_site_vertical_style',
		),
		'showMenu' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_navigation_site_vertical_showMenu',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		$wrapper_classes = self::get_wrapper_classes( $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		$block_html = ob_get_clean();

		return $block_html;

	}


	protected static function get_wrapper_classes( $attrs ) {

		$base_class = 'wsu-navigation-site-vertical';

		$wrapper_classes = array( $base_class );

		if ( static::is_set( $attrs, 'style' ) ) {

			$wrapper_classes[] = $base_class . '--' . $attrs[ 'style' ];

		}

		return $wrapper_classes;

	}


	public static function customizer( $wp_customize, $panel ) {

		$section_id = $panel . '_component_navigation_site_vertical';

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Vertical Navigation' ),
				'description' => __( 'Edit vertical navigation settings' ),
				'panel'       => $panel,
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_navigation_site_vertical_style',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_navigation_site_vertical_showMenu',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_navigation_site_vertical_style_control',
			array(
				'settings'    => 'wsuwp_wds_component_navigation_site_vertical_style',
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Navigation Style' ),
				'description' => __( 'Change navigation style.' ),
				'choices'     => array(
					'default' => 'Default',
					'dark'    => 'Dark',
				),
			)
		);

	}
}
