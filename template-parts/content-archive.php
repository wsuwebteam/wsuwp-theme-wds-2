<?php namespace WSUWP\Theme\WDS;

Template::render( 'template-parts/header-archive', get_post_type() );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		Template::render( 'template-parts/article-archive', get_post_type() );

	} // end while
} // end if

Template::render( 'template-parts/footer-archive', get_post_type() );