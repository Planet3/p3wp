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

		<?php planet3_0_posted_in(); ?>

		<?php edit_post_link( __( 'Edit', 'planet3_0' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

</article><!-- #post-## -->
