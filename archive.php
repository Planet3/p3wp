<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<section id="primary" class="content-area row">
		<div id="content" class="site-content large-10 large-centered columns" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header section-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) {
							printf( '<span>' . single_cat_title( '', false ) . '</span>' );

						} elseif ( is_tag() ) {
							printf( 'Tag Archives: %s', '<span>' . single_tag_title( '', false ) . '</span>' );

						} elseif ( is_author() ) {
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						} elseif ( is_day() ) {
							printf( 'Daily Archives: %s', '<span>' . get_the_date() . '</span>' );

						} elseif ( is_month() ) {
							printf( 'Monthly Archives: %s', '<span>' . get_the_date( 'F Y' ) . '</span>' );

						} elseif ( is_year() ) {
							printf( 'Yearly Archives: %s', '<span>' . get_the_date( 'Y' ) . '</span>' );

						} else {
							echo 'Archives' ;

						}
					?>
				</h1><!-- page-title -->
				<?php
					if ( is_category() ) {
						// show an optional category description
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

					} elseif ( is_tag() ) {
						// show an optional tag description
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
					} elseif (is_author() ) {
						// show an optional author description
						$author_description = author_description();
						if ( ! empty( $author_description ) )
							echo apply_filters( 'author_archive_meta', '<div class="taxonomy-description">' . $author_description . '</div>' );

					}
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content' ); ?>

			<?php endwhile; ?>

			<?php planet3_0_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>