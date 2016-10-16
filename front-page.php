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

			<div class="large-12">
				<?php if (planet3_0_check_category_exists('quote')) : ?>
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
								<?php while ( $quote_query -> have_posts() ) : $quote_query -> the_post(); ?>
									<?php get_template_part( 'content', 'fpquote' ); ?>
								<?php endwhile; ?>
							</ul><!-- large-block-grid-3 -->
						</div><!-- #quote -->
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p>There are no posts in the quote category to display.</p>
					<?php endif; ?>
				<?php else : ?>
					<p>The quote would go here but it has not been created yet.</p>
				<?php endif; ?>

				<?php if (planet3_0_check_category_exists('bleg')) : ?>
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
								<?php while ( $bleg_query -> have_posts() ) : $bleg_query -> the_post(); ?>
									<?php get_template_part( 'content', 'fpbleg' ); ?>
								<?php endwhile; ?>
							</ul><!-- large-block-grid-3 -->
						</div><!-- #bleg -->
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p>There are no posts in the bleg category to display.</p>
					<?php endif; ?>
				<?php else : ?>
					<p>The bleg category would go here but it has not been created yet.</p>
				<?php endif; ?>

			</div><!-- large-12 -->

		</div><!-- row -->
		<div class="row">

			<div class="posts-area large-6 columns">
				<div id="media">

					<div class="lede">
						<?php if (planet3_0_check_category_exists('article')) : ?>
							<?php $args = array(
								'category__in' => planet3_0_cat_slug_to_id('article'),
								'posts_per_page' => 3
								);
							/* Start the lede Loop */ 
							$lede_query = new WP_Query( $args );
							if ( $lede_query -> have_posts() ) : ?>
								<div id="lede" >
									<header class="section-header">
										<h1><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?></h1>
										<?php echo category_description( $args['category__in'] ); ?>
									</header><!-- section-header -->
									<?php while ( $lede_query -> have_posts() ) : $lede_query -> the_post(); ?>
										<?php get_template_part( 'content', 'fplede' ); ?>
									<?php endwhile; ?>
									<p class="archive-button"><a class="radius small button" href="<?php echo get_category_link( $args['category__in'] ); ?>"><?php echo esc_html( get_the_category_by_ID( $args['category__in'] ) ); ?> Archives</a></p>
								</div><!-- lede -->
								<?php wp_reset_postdata(); ?>
							<?php else : ?>
								<p>There are no posts in the article category to display.</p>
							<?php endif; ?>
						<?php else : ?>
							<p>The article category would go here but it has not been created yet.</p>
						<?php endif; ?>
					</div><!-- .lede -->

				</div><!-- #media -->

			</div><!-- posts-area large-6 -->

			<div class="posts-area large-6 columns">
				<?php if (planet3_0_check_category_exists('beyond-planet-three')) : ?>
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
					<?php else : ?>
						<p>There are no posts in the beyond category to display.</p>
					<?php endif; ?>
				<?php else : ?>
					<p>The beyond category would go here but it has not been created yet.</p>
				<?php endif; ?>
			</div><!-- posts-area large-6 columns -->

		</div><!-- row -->

	</div><!-- #primary -->

<?php get_footer(); ?>