<?php if ( ! empty( $attrs['imageSrc'] ) ) : ?>
<div class="<?php echo esc_attr( $wrapper_classes ); ?>">
	<img src="<?php echo esc_attr( $attrs['imageSrc'] );?>"
		srcset="<?php echo esc_attr( $attrs['imageSrcset'] ); ?>"
		sizes="<?php echo esc_attr( $attrs['imageSizes'] );?>"
		alt="<?php echo esc_attr( $attrs['imageAlt'] );?>" />
</div>
<?php endif; ?>