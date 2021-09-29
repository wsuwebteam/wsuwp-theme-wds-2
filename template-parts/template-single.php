<main class="wsu-wrapper-content<?php if ( WSUWP\Theme\WDS\Sidebars::has() ) : ?> wsu-wrapper-content--has-sidebar<?php endif; ?>">
	<div class="wsu-page-content">
		<?php
		if ( have_posts() ) {

			while ( have_posts() ) {

				the_post();

				echo '<article class="wsu-article">';

					if ( 'before' === WSUWP\Theme\WDS\Template::get_option( 'hero_position', get_post_type(), 'single' ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type() );

					}

					get_template_part( 'template-parts/template-single-header', get_post_type() );

					if ( 'after' === WSUWP\Theme\WDS\Template::get_option( 'hero_position', get_post_type(), 'single' ) ) {

						get_template_part( 'template-parts/template-hero', get_post_type() );

					}

					get_template_part( 'template-parts/template-single-content', get_post_type() );

					get_template_part( 'template-parts/template-single-footer', get_post_type() );

				echo '</article>';

			} // end while
		}  ;?>
	</div>
	<?php get_template_part( 'template-parts/template-sidebar', get_post_type() ); ?>
</main>