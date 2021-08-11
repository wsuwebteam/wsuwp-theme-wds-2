<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Layout extends Block {

	protected static $block_name    = 'wsuwp/post-layout';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'format'    => 'default',
		'style'     => 'default',
		'context'   => '',
	);


	public static function render( $attrs, $content = '' ) {


		$wrapper_classes = 'wsu-layout';

		$context = ( ! empty( $attrs['context'] ) ) ? $attrs['context'] .'-' : '';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-layout--', 'style', $attrs );
		static::add_class( $wrapper_classes, 'wsu-layout--', 'format', $attrs );

		ob_start();

		switch ( $attrs['format'] ) {

			case 'sidebar':
				include __DIR__ . '/templates/sidebar.php';
				break;
			default:
				include __DIR__ . '/templates/default.php';
				break;
			
		}

		return ob_get_clean();

	}


    public static function customizer( $wp_customize, $panel ) {

        $customizer_prefix = static::get_customizer_prefix();

		$section_id = "{$customizer_prefix}_section";

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Header Site' ),
				'description' => __( 'Edit Global Header Settings' ),
				'panel'       => $panel,
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			"{$customizer_prefix}_style",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_setting(
			"{$customizer_prefix}_format",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);


		$wp_customize->add_control(
			"{$customizer_prefix}_style_control",
			array(
				'settings'    => "{$customizer_prefix}_style",
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Style' ),
				'description' => __( 'Change global header style.' ),
				'choices'     => array(
					'default' => 'Default',
				),
			)
		);

		$wp_customize->add_control(
			"{$customizer_prefix}_format_control",
			array(
				'settings'    => "{$customizer_prefix}_format",
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Format' ),
				'description' => __( 'Change global header style.' ),
				'choices'     => array(
					'default' => 'Default',
					'sidebar' => 'Sidebar',
				),
			)
		);

	}

}