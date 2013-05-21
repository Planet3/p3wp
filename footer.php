<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer antialiased" role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>
		<div class="site-info">
			<?php do_action( 'planet3_0_credits' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
jQuery(document).foundation();
</script>
</body>
</html>