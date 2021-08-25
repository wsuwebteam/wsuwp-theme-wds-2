<ul class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<?php if ( empty( $attrs['hideTwitter]'] ) ) : ?>
	<li class="wsu-social-icons__twitter">
		<a href="https://twitter.com/intent/tweet?text=<?php echo esc_url( $attrs['title'] ); ?>&url=<?php echo esc_url( $attrs['link'] ); ?>" title="Share on Twitter"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideFacebook]'] ) ) : ?>
	<li class="wsu-social-icons__faceblook">
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( $attrs['link'] ); ?>" title="Share on FaceBook"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideLinkedin]'] ) ) : ?>
	<li class="wsu-social-icons__linkedin">
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( $attrs['link'] ); ?>" title="Share on Linkedin"></a>
	</li>
	<?php endif; ?>
	<?php if ( empty( $attrs['hideEmail]'] ) ) : ?>
	<li class="wsu-social-icons__email">
		<a href="mailto:?subject=Shared%20With%20You:%20<?php echo urldecode( $attrs['title'] ); ?>&body=<?php echo esc_url( $attrs['bodyText'] ); ?> <?php echo esc_url( $attrs['link'] ); ?>" title="share with email"></a>
	</li>
	<?php endif; ?>
</ul>