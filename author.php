<?php
/**
 * The template for displaying author pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<div id="content" class="site-content large-12 columns" role="main">
			<?php if ( have_posts() ) : ?>

				<?php // Queue the first post, that way we know what author we're dealing with
				the_post(); ?>

				<h1 class="author-name page-title"><?php the_author() ;?></h1>

				<div class="row">

					<div class="author-bio large-4 columns">

						<div class="author-avatar hide-for-small">
							<?php if ( validate_gravatar( get_the_author_meta( 'user_email' ) ) ) :
								echo get_avatar( get_the_author_meta( 'user_email' ), 512, $default, get_the_author() ); 
							endif; ?>
						</div><!-- author-avatar hide-for-small-->
						<div class="author-description">
							<ul class="social-links">
								<?php if ( get_the_author_meta( 'user_url' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'user_url' ) ); ?>" rel="me" title="<?php the_author() ;?>'s HomePage"><?php the_author() ;?>'s HomePage</a></li>
								<?php endif; ?>
								<?php if ( get_the_author_meta( 'twitter' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'twitter' ) ); ?>" rel="me" title="Twitter">Twitter</a></li>
								<?php endif; ?>
								<?php if ( get_the_author_meta( 'facebook' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'facebook' ) ); ?>" rel="me" title="Facebook">Facebook</a></li>
								<?php endif; ?>
								<?php if ( get_the_author_meta( 'googleplus' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'googleplus' ) ); ?>" rel="me" title="Google+">Google+</a></li>
								<?php endif; ?>
								<?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'linkedin' ) ); ?>" rel="me" title="LinkedIn">LinkedIn</a></li>
								<?php endif; ?>
								<?php if ( get_the_author_meta( 'reddit' ) ) : ?>
									<li><a href="<?php esc_url( the_author_meta( 'reddit' ) ); ?>" rel="me" title="Reddit">Reddit</a></li>
								<?php endif; ?>
							</ul>
							<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<p><?php the_author_meta('description'); ?></p><!-- author-bio -->
							<?php endif; ?>
						</div>
					</div><!-- byline large-4 -->

					<div class="large-8 columns">
						<?php /* Start the Loop */ ?>
						<?php
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts()
						;?>
						<h1 class="section-header">Recent Articles</h1>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content' ); ?>

						<?php endwhile; ?>

							<?php planet3_0_content_nav( 'nav-below' ); ?>

					</div><!-- large-8 -->
				</div><!-- row -->

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>