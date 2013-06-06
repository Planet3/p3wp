<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->


	<div class="byline large-2 columns">
		<div class="entry-meta meta-above">
			<?php planet3_0_posted_on(); ?> <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
		<div class="author-avatar hide-for-small">
			<?php if ( validate_gravatar( get_the_author_meta( 'user_email' ) ) ) :
				echo get_avatar( get_the_author_meta( 'user_email' ), 256, $default, get_the_author() ); 
			endif; ?>
		</div>
		<h1><?php planet3_0_posted_by(); ?></h1>
			<?php
			// Display Author's discription if it exists
			if ( get_the_author_meta( 'user_description' ) ) : ?>
		<div class="author-bio hide-for-small">
			<p><?php the_author_meta( 'user_description' ); ?></p>
		</div><!-- .author-bio -->
		<?php endif; ?>
	</div><!-- .byline -->

	<div class="large-10 columns">
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta meta-bellow large-12 columns" >
			<?php planet3_0_posted_in(); ?>
		</footer><!-- .entry-meta -->
	</div><!-- . large-9 columns -->
</article><!-- #post-## -->
