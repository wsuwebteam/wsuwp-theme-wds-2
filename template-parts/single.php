<?php namespace WSUWP\Theme\WDS; ?>

<main class="wsu-wrapper-content<?php if ( Sidebars::has() ) : ?> wsu-wrapper-content--has-sidebar<?php endif; ?>">
	<?php if ( Sidebars::has() ) : ?><div class="wsu-page-content"><?php endif; ?>
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			Template::render( 'block-templates/article', get_post_type() );

		} // end while
	} 
	;?>
	<?php if ( Sidebars::has() ) : ?></div>
	<?php get_template_part( 'template-parts/sidebar', get_post_type() ); ?>
	<?php endif; ?>
</main>
