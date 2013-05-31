<?php
/**
 * The is the template file for displaying the front page. 
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area" role="main">

		<div class="top-area row">
			<?php $args = array(
				'category__in' => planet3_0_cat_slug_to_id('lede'),
				'posts_per_page' => 1
				);
			/* Start the lede Loop */ 
			$lede_query = new WP_Query( $args );
			if ( $lede_query -> have_posts() ) : ?>
					<div id="lede" class="large-8 columns">
						<header class="section-header">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<?php while ( $lede_query -> have_posts() ) : $lede_query -> the_post();
							$do_not_duplicate[] = $post->ID; ?>
							<?php get_template_part( 'content', 'fplede' ); ?>
						<?php endwhile; ?>
					</div><!-- #lede -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<div class="large-4 columns hide-for-small">

				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('quote'),
					'posts_per_page' => 1
					);
				/* Start the quote Loop */ 
				$quote_query = new WP_Query( $args ); 
				if ( $quote_query -> have_posts() ) : ?>
					<div id="quote">
						<header class="section-header assistive-text">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<ul class="large-block-grid-1">
							<?php while ( $quote_query -> have_posts() ) : $quote_query -> the_post();
								if ( isset($do_not_duplicate) ) {
									if (in_array($post->ID, $do_not_duplicate)) continue; 
								} ?>
								<?php get_template_part( 'content', 'fpquote' ); ?>
							<?php endwhile; ?>
						</ul><!-- large-block-grid-3 -->
					</div><!-- #quote -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>

				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('bleg'),
					'posts_per_page' => 1
					);
				/* Start the bleg Loop */ 
				$bleg_query = new WP_Query( $args ); 
				if ( $bleg_query -> have_posts() ) : ?>
					<div id="bleg">
						<header class="section-header assistive-text">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<ul class="large-block-grid-1">
							<?php while ( $bleg_query -> have_posts() ) : $bleg_query -> the_post();
								if ( isset($do_not_duplicate) ) {
									if (in_array($post->ID, $do_not_duplicate)) continue; 
								} ?>
								<?php get_template_part( 'content', 'fpexcerpt' ); ?>
							<?php endwhile; ?>
						</ul><!-- large-block-grid-3 -->
					</div><!-- #bleg -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>



				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('open-thread'),
					'posts_per_page' => 1
					);
				/* Start the open thread Loop */ 
				$open_thread_query = new WP_Query( $args ); 
				if ( $open_thread_query -> have_posts() ) : ?>
					<div id="open-thread">
						<header class="section-header assistive-text">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<ul class="large-block-grid-1">
							<?php while ( $open_thread_query -> have_posts() ) : $open_thread_query -> the_post();
								if ( isset($do_not_duplicate) ) {
									if (in_array($post->ID, $do_not_duplicate)) continue; 
								} ?>
								<?php get_template_part( 'content', 'fpexcerpt' ); ?>
							<?php endwhile; ?>
						</ul><!-- large-block-grid-3 -->
					</div><!-- #bleg -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>


			</div><!-- large-4 -->
		</div><!-- row -->

		<div class="row">

			<div class="posts-area push-6 large-6 columns">
				<?php $args = array(
					'category__in' => planet3_0_cat_slug_to_id('beyond-planet-three'),
					'posts_per_page' => 5
					);
				/* Start the beyond Loop */ 
				$beyond_query = new WP_Query( $args );
				if ( $beyond_query -> have_posts() ) : ?>
					<div id="beyond">
						<header class="section-header">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<ul class="large-block-grid-1">
							<?php while ( $beyond_query -> have_posts() ) : $beyond_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fpexcerpt' ); ?>
							<?php endwhile; ?>
						</ul><!-- .large-block-grid-3 -->
						<p class="archive-button"><a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a></p>
					</div><!-- #beyond -->
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div><!-- posts-area large-6 columns -->

			<div class="posts-area large-6 pull-6 columns">
				<div id="media">
					<div class="video">
						<?php $args = array(
							'category__in' => planet3_0_cat_slug_to_id('video'),
							'posts_per_page' => 1
							);
						/* Start the video media Loop */ 
						$video_query = new WP_Query( $args );
						if ( $video_query -> have_posts() ) : ?>
						<header class="section-header">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
							<ul class="large-block-grid-1">
								<?php while ( $video_query -> have_posts() ) : $video_query -> the_post(); ?>
									<?php get_template_part( 'content', 'fpcontent' ); ?>
								<?php endwhile; ?>
							</ul><!-- .large-block-grid-1 -->
							<div>
							<p class="archive-button"><a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a></p>
							</div>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div><!-- .video -->

					<div class="image">
						<?php $args = array(
							'category__in' => planet3_0_cat_slug_to_id('image'),
							'posts_per_page' => 1
							);
						/* Start the image media Loop */ 
						$image_query = new WP_Query( $args );
						if ( $image_query -> have_posts() ) : ?>
						<header class="section-header">
							<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
							<?php echo category_description( $args['category__in'] ); ?>
						</header><!-- section-header -->
						<ul class="large-block-grid-1">
							<?php while ( $image_query -> have_posts() ) : $image_query -> the_post(); ?>
								<?php get_template_part( 'content', 'fpcontent' ); ?>
							<?php endwhile; ?>
						</ul><!-- .large-block-grid-1 -->
						<p class="archive-button"><a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a></p>
						<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div><!-- .image -->
				</div><!-- #media -->
			</div><!-- posts-area large-6 -->

			<?php $args = array(
				'category__in' => planet3_0_cat_slug_to_id('featured'),
				'category__not_in' => planet3_0_cat_slug_to_id('media'),
				'posts_per_page' => 4
				);
			/* Start the featured Loop */ 
			$featured_query = new WP_Query( $args ); 
			if ( $featured_query -> have_posts() ) : ?>
				<div id="featured" class="posts-area large-12 columns">
					<header class="section-header">
						<h1>Past Features</h1>
						<?php echo category_description( $args['category__in'] ); ?>
					</header><!-- section-header -->
					<ul class="large-block-grid-3">
						<?php while ( $featured_query -> have_posts() ) : $featured_query -> the_post();
							if ( isset($do_not_duplicate) ) {
								if (in_array($post->ID, $do_not_duplicate)) continue; 
							} ?>
							<?php get_template_part( 'content', 'fpfeatured' ); ?>
						<?php endwhile; ?>
					</ul><!-- large-block-grid-3 -->
					<p class="archive-button"><a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a></p>
				</div><!-- #featured -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

		</div><!-- row -->
	</div><!-- #primary -->

<?php get_footer(); ?>