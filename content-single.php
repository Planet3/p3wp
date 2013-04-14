<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header hide">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta meta-above">
			<?php planet3_0_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'planet3_0' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<hr />

	<footer class="entry-meta meta-bellow" >

		<?php // If a user has filled out their decscription show a bio on their entries
		if ( get_the_author_meta('description') ) : ?>
				<div class="author-bio">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), 100, $default, get_the_author() ); ?>
					<h2>About the author</h2>
					<p><?php the_author_meta('description')?></p>
				</div><!-- .author-bio -->
		<?php endif; ?>


		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'planet3_0' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'planet3_0' ) );

			if ( ! planet3_0_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This article was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'planet3_0' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'planet3_0' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This article was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'planet3_0' );
				} else {
					$meta_text = __( 'This article was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'planet3_0' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'planet3_0' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
