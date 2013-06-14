<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header assistive-text">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->

		<div class="entry-summary <?php if ( strlen( get_the_content() ) > 300 ) { echo 'quote-small'; } ?>">
			<?php if( $post->post_excerpt ) {
				the_excerpt();
			} else {
				the_content();
			} ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta meta-bellow">
			<?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->
</li>