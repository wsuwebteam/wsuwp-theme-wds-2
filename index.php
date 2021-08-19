<?php namespace WSUWP\Theme\WDS; ?>

<?php get_header(); ?>
<!-- GLOBAL CONTAINER:START -->
<div class="wsu-wrapper-global">
	<?php Template::render( 'template-parts/header-global', get_post_type() ); ?>
	<?php Template::render( 'template-parts/navigation-site-vertical', get_post_type() ); ?>
	<!-- SITE WRAPPER:START -->
	<div class="wsu-wrapper-site">
		<!-- SITE CONTAINER:START -->
		<?php Template::render( 'template-parts/header-site', get_post_type() ); ?>
		<?php Template::render( 'template-parts/archive', get_post_type() ); ?>
		<!-- SITE CONTAINER:END -->
	</div>
	<!-- SITE WRAPPER:END -->
    <?php Template::render( 'template-parts/footer-global', get_post_type() ); ?>
</div>
<!-- GLOBAL CONTAINER:END -->
<?php get_footer(); ?>