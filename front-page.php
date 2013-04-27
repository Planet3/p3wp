<?php
/**
 * The is the template file for displaying the front page. 
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area row" role="main">
			<?php $args = array(
				'category__in' => planet3_0_cat_slug_to_id('lede'),
				'posts_per_page' => 1
				);
			/* Start the lede Loop */ 
			$lede_query = new WP_Query( $args );
			if ( $lede_query -> have_posts() ) : ?>
				<div class="row">
					<div id="lede" class="large-12 columns">
						<h1>Lede</h1>
						<?php while ( $lede_query -> have_posts() ) : $lede_query -> the_post();
							$do_not_duplicate[] = $post->ID; ?>
							<?php get_template_part( 'content', 'fplede' ); ?>
						<?php endwhile; ?>
					</div><!-- #lede -->
				</div><!-- row -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		<div class="row" >
			<div class="large-9 columns">
				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('featured'),
					'category__not_in' => planet3_0_cat_slug_to_id('media'),
					'posts_per_page' => 4
					);
				/* Start the featured Loop */ 
				$featured_query = new WP_Query( $args ); 
				if ( $featured_query -> have_posts() ) : ?>
					<div id="featured" class="row">
						<h1>Featured</h1>
						<ul class="large-block-grid-3">
							<?php while ( $featured_query -> have_posts() ) : $featured_query -> the_post();
								if ( isset($do_not_duplicate) ) {
									if (in_array($post->ID, $do_not_duplicate)) continue; 
								} ?>
								<?php get_template_part( 'content', 'fp' ); ?>
							<?php endwhile; ?>
						</ul><!-- large-block-grid-3 -->
					</div><!-- #featured row -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>


				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('beyond-planet-three'),
					'posts_per_page' => 6
					);
				/* Start the beyond Loop */ 
				$beyond_query = new WP_Query( $args );
				if ( $beyond_query -> have_posts() ) : ?>
					<div id="beyond" class="row">
					<h1>Beyond Planet Three</h1>
						<ul class="large-block-grid-3">
							<?php while ( $beyond_query -> have_posts() ) : $beyond_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fp' ); ?>
							<?php endwhile; ?>
						</ul><!-- .large-block-grid-3 -->
					</div><!-- # beyond row -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div><!-- large-9 -->

			<div class="large-3 columns hide-for-small">
				<?php get_sidebar(); ?>
			</div><!-- large-3 -->
		</div><!-- row -->

	</div><!-- #primary -->

<?php get_footer(); ?>