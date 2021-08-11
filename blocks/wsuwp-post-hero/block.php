<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Post_Hero extends Block {

	protected static $block_name    = 'wsuwp/post-hero';
	protected static $default_attrs = array(
		'className'    => '',
        'hide'         => false,
		'style'        => 'default',
		'imageId'      => '',
		'imageSrc'     => '',
		'imageAlt'     => '',
		'imageCaption' => '',
		'imageRatio'   => '16-9',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			self::set_image_attrs( $attrs );

			ob_start();

			if ( ! empty( $attrs['imageSrc'] ) ) {

				switch ( $attrs['style'] ) {
	
					case 'figure':
						include __DIR__ . '/templates/figure.php';
						break;
	
					default:	
						include __DIR__ . '/templates/default.php';
						break;
				}
			}

			return ob_get_clean();

		} else {

			return '';
		}

	}


	protected static function set_image_attrs( &$attrs ) {

		if ( empty( $attrs['imageSrc'] ) && has_post_thumbnail() ) {

			$attrs['imageId']      = get_post_thumbnail_id();
			$attrs['imageSrc']     = wp_get_attachment_image_src( $attrs['imageId'], 'full' );
			$attrs['imageSrcset']  = wp_get_attachment_image_srcset( $attrs['imageId'], 'full' );
			$attrs['imageSizes']   = wp_get_attachment_image_sizes( $$attrs['imageId'], 'full' );
			$attrs['imageAlt']     = get_post_meta( $attrs['imageId'], '_wp_attachment_image_alt', true);
			$attrs['imageCaption'] = wp_get_attachment_caption( $attrs['imageId'] );

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