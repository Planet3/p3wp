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

		<div class="row">

			<header class="page-header large-9 columns">
				<h1 class="author-name page-title">
					<?php 
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
					;?>
				</h1><!-- author-name page-title -->
				<p class="author-bio"><?php the_author_meta('description'); ?>
					<ul class="inline-list">
						<li>HomePage</li>
						<li>Twitter</li>
						<li>Facebook</li>
						<li>Google+</li>
					</ul>
				</p><!-- author-bio -->
			</header><!-- .page-header large-8 -->

			<div class="large-3 columns">
				<div class="author-avatar hide-for-small">
					<?php if ( validate_gravatar( get_the_author_meta( 'user_email' ) ) ) :
						echo get_avatar( get_the_author_meta( 'user_email' ), 256, $default, get_the_author() ); 
					endif; ?>
				</div><!-- author-avatar hide-for-small-->
			</div><!--  large-3 pull-9 -->
		</div><!-- row -->


		<?php
		/* Since we called the_post() above, we need to
		 * rewind the loop back to the beginning that way
		 * we can run the loop properly, in full.
		 */
		rewind_posts()
		;?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

		<?php endwhile; ?>

			<?php planet3_0_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>