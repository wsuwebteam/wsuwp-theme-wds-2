<?php namespace WSUWP\Theme\WDS;


class Template {


	public static function render( $slug, $name = '', $args = array() ) {

		ob_start();

		get_template_part( $slug, $name, $args );

		$html = ob_get_clean();

		echo do_blocks( $html );

	}

}
