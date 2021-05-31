<?php
/**
 * Displays header site branding
 *
 */

$blog_info    = get_bloginfo( 'name' );

?>
<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

</div><!-- .site-branding -->
