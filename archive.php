<?php namespace WSUWP\Theme\WDS; ?>
<?php

$post_type = ( is_post_type_archive() ) ? get_post_type() : '';

;?>

<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
    <?php Template::render( 'block-templates/header-global', $post_type ); ?>
    <?php Template::render( 'block-templates/navigation-site-vertical', $post_type ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php Template::render( 'block-templates/header-site', $post_type ); ?>
		<?php Template::render( 'block-templates/navigation-site-horizontal', $post_type ); ?>
		<?php Template::render( 'template-parts/archive', $post_type ); ?>
		<?php get_template_part( 'template-parts/footer-site', $post_type ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
    <?php Template::render( 'block-templates/footer-global', $post_type ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>