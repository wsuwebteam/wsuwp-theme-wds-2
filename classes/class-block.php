<?php namespace WSUWP\Theme\WDS;


class Block {

	protected static $block_name    = false;
	protected static $default_attrs = array();


	public function get( $property ) {

		switch ( $property ) {

			case 'block_name':
				return static::$block_name;

			case 'default_attrs':
				return static::$default_attrs;

		}

	}


	public static function render_block(  $attrs, $content = '' ) {

		self::parse_attrs( $attrs );

		return static::render( $attrs, $content );

	}


	protected static function parse_attrs( &$attrs ) {

		$default_attrs = self::get( 'default_attrs' );

		foreach ( $default_attrs as $attr_key => $attr_args ) {

			$default_value      = ( is_array( $attr_args ) && ! empty( $attr_args['default'] ) ) ? $attr_args['default'] : '';
			$customizer_setting = ( is_array( $attr_args ) && ! empty( $attr_args['setting'] ) ) ? $attr_args['setting'] : false;

			if ( ! self::is_set( $attrs, $attr_key ) ) {

				if ( $customizer_setting ) {

					$attrs[ $attr_key ] = get_theme_mod( $customizer_setting, $default_value );

				} else {

					$attrs[ $attr_key ] = $default_value;

				}
			}
		}

	}


	protected static function is_set( $attrs, $key ) {

		if ( empty( $attrs[ $key ] ) || 'default' === $attrs[ $key ] ) {

			return false;

		} else {

			return true;
		}

	}

}
