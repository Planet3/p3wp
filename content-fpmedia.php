<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'planet3_0' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_content(); ?>
		</div><!-- .entry-summary -->

			<footer class="entry-meta meta-bellow">
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'planet3_0' ), __( '1 Comment', 'planet3_0' ), __( '% Comments', 'planet3_0' ) ); ?></span>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'planet3_0' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->

	</article><!-- #post-## -->
</li>
