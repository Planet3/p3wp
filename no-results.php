<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'planet3_0' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="entry-content large-10 large-centered columns">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'planet3_0' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'planet3_0' ); ?></p>
				<?php get_search_form(); ?>

			<?php else : ?>

				<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'planet3_0' ); ?></p>
				<?php get_search_form(); ?>

			<?php endif; ?>
		</div><!-- .entry-content -->
	</div><!-- .row -->
</article><!-- #post-0 .post .no-results .not-found -->
