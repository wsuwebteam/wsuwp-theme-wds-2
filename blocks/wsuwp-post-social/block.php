<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Social extends Block {

	protected static $block_name    = 'wsuwp/post-social';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'style'     => 'default',
		'bodyText'  => '',
		'title'     => '',
		'link'      => '',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			self::set_attrs( $attrs );

			$wrapper_classes = 'wsu-social-icons';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-social-icons--', 'style', $attrs );

			ob_start();

			include __DIR__ . '/templates/default.php';

			return ob_get_clean();

		} else {

			return '';
		}

	}


	public static function set_attrs( &$attrs ) {

		if ( in_the_loop() ) {

			//$attrs['link'] = ( empty( $attrs['link'] ) ) ? urlencode( get_permalink() ) : $attrs['link'];

			//$attrs['title'] = ( empty( $attrs['link'] ) ) ? urlencode( get_the_title() ) : $attrs['title'];

			$attrs['link'] = ( empty( $attrs['link'] ) ) ? get_permalink() : $attrs['link'];

			$attrs['title'] = ( empty( $attrs['title'] ) ) ? get_the_title() : $attrs['title'];

		}

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