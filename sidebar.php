<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>
	<div id="secondary" class="widget-area footer-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php dynamic_sidebar(); ?>
	</div><!-- #secondary -->
