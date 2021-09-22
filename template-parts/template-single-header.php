<header class="wsu-article-header">
    <h1  class="wsu-article-header__title"><?php the_title(); ?></h1>
    <?php get_template_part( 'template-component/component-post-published-date', get_post_type() ); ?>
    <?php get_template_part( 'template-component/component-post-social-share', get_post_type() ); ?>
</header>