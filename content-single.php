<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header assistive-text">
		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div class="row">

		<div class="byline large-2 columns">
			<div class="author-avatar hide-for-small">
				<?php if ( validate_gravatar( get_the_author_meta( 'user_email' ) ) ) :
					echo get_avatar( get_the_author_meta( 'user_email' ), 256, $default, get_the_author() ); 
				endif; ?>
			</div>
			<h1><?php planet3_0_posted_by(); ?></h1>
			<div class="author-bio hide-for-small">
				<p><?php the_author_meta('description'); ?></p>
			</div><!-- .author-bio -->
		</div><!-- .byline -->

		<div class="large-10 columns">
			<div class="entry-content">
				<div class="entry-meta meta-above">
					<?php planet3_0_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'planet3_0' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->

			<hr />

			<div class="row">
				<footer class="entry-meta meta-bellow large-12 columns" >
					<?php planet3_0_posted_in(); ?>
					<?php edit_post_link( __( 'Edit', 'planet3_0' ), '<span class="edit-link">', '</span>' ); ?>
				</footer><!-- .entry-meta -->
			</div><!-- .row -->
		</div><!-- . large-9 columns -->

	</div><!-- .row -->

</article><!-- #post-## -->
