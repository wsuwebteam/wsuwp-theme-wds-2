<div class="wsu-wrapper-content">
	<div class="wsu-layout wsu-layout--sidebar">
		<main class="wsu-layout-panel">
			<h1><?php the_archive_title(''); ?></h1>
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

					WSUWP\Theme\WDS\Template::render( 'block-templates/article-list', get_post_type() );

				} // end while

				WSUWP\Theme\WDS\Template::render( 'block-templates/pagination', get_post_type() );
		} 
		;?>
		</main>
		<aside class="wsu-layout-panel">
			<?php WSUWP\Theme\WDS\Template::render( 'template-parts/sidebar', get_post_type() ); ?>
		</aside>
	</div>
</div>
