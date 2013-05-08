<?php
/**
 * The is the template file for displaying the front page. 
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area" role="main">

			<?php $args = array(
				'category__in' => planet3_0_cat_slug_to_id('lede'),
				'posts_per_page' => 1
				);
			/* Start the lede Loop */ 
			$lede_query = new WP_Query( $args );
			if ( $lede_query -> have_posts() ) : ?>
				<div class="row">
					<div id="lede" class="large-12 columns">
						<?php while ( $lede_query -> have_posts() ) : $lede_query -> the_post();
							$do_not_duplicate[] = $post->ID; ?>
							<?php get_template_part( 'content', 'fplede' ); ?>
						<?php endwhile; ?>
					</div><!-- #lede -->
				</div><!-- row -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		<div class="row">
			<div class="posts-area large-5 columns">

				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('featured'),
					'category__not_in' => planet3_0_cat_slug_to_id('media'),
					'posts_per_page' => 3
					);
				/* Start the featured Loop */ 
				$featured_query = new WP_Query( $args ); 
				if ( $featured_query -> have_posts() ) : ?>
					<div id="featured" >
						<ul class="large-block-grid-2">
							<?php while ( $featured_query -> have_posts() ) : $featured_query -> the_post();
								if ( isset($do_not_duplicate) ) {
									if (in_array($post->ID, $do_not_duplicate)) continue; 
								} ?>
								<?php get_template_part( 'content', 'fpfeatured' ); ?>
							<?php endwhile; ?>
						</ul><!-- large-block-grid-3 -->
						<div class="row">
							<div class="archive-button large-12 columns">
								<a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a>
							</div><!-- .archive-button -->
						</div><!-- row -->
					</div><!-- #featured -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>



				<div id="media">
					<ul class="large-block-grid-1">

						<?php $args = array(
							'category__in' => planet3_0_cat_slug_to_id('video'),
							'posts_per_page' => 1
							);
						/* Start the video media Loop */ 
						$video_query = new WP_Query( $args );
						if ( $video_query -> have_posts() ) : ?>
							<?php while ( $video_query -> have_posts() ) : $video_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fpmedia' ); ?>
							<?php endwhile; ?>
							<div class="row">
								<div class="archive-button large-12 columns">
									<a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a>
								</div><!-- .archive-button -->
							</div><!-- row -->
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

						<?php $args = array(
							'category__in' => planet3_0_cat_slug_to_id('image'),
							'posts_per_page' => 1
							);
						/* Start the image media Loop */ 
						$image_query = new WP_Query( $args );
						if ( $image_query -> have_posts() ) : ?>
							<?php while ( $image_query -> have_posts() ) : $image_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fpmedia' ); ?>
							<?php endwhile; ?>
							<div class="row">
								<div class="archive-button large-12 columns">
									<a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a>
								</div><!-- .archive-button -->
							</div><!-- row -->
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>

					</ul><!-- .large-block-grid-3 -->
				</div><!-- #media -->

			</div><!-- posts-area large-5 -->

			<div class="posts-area large-4 columns">
				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('beyond-planet-three'),
					'posts_per_page' => 6
					);
				/* Start the beyond Loop */ 
				$beyond_query = new WP_Query( $args );
				if ( $beyond_query -> have_posts() ) : ?>
					<div id="beyond">
						<div id="beyond" class="section-title">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</div><!-- section-title -->
						<ul class="large-block-grid-1">
							<?php while ( $beyond_query -> have_posts() ) : $beyond_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fpbeyond' ); ?>
							<?php endwhile; ?>
						</ul><!-- .large-block-grid-3 -->
						<div class="row">
							<div class="archive-button large-12 columns">
								<a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a>
							</div><!-- .archive-button -->
						</div><!-- row -->
					</div><!-- #beyond -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div><!-- posts-area large-4 columns -->

			<div class="large-3 columns hide-for-small">
				<?php get_sidebar(); ?>
			</div><!-- large-3 -->

		</div><!-- row -->
	</div><!-- #primary -->

<?php get_footer(); ?>