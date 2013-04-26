<?php
/**
 * The is the template file for displaying the front page. 
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area row">

		<?php if ( have_posts() ) : ?>
			<div class="row">
				<div id="lede" class="large-10 large-centered columns" role="main">
					<h1>Lede</h1>
					<?php $args = array(
						'category__in' => planet3_0_cat_slug_to_id('lede'),
						'posts_per_page' => 1
						); ?>
					<?php /* Start the lede Loop */ 
					$lede_query = new WP_Query( $args );
					while ( $lede_query -> have_posts() ) : $lede_query -> the_post();
						$do_not_duplicate[] = $post->ID; ?>
						<?php get_template_part( 'content', 'fplede' ); ?>
					<?php endwhile; ?>
				</div><!-- #lede -->
			</div><!-- row -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>


		<?php if ( have_posts() ) : ?>
			<div class="row">
				<div id="featured" class="large-10 large-centered columns" role="main">
					<h1>Featured</h1>
					<?php $args = array(
						'category__in' => planet3_0_cat_slug_to_id('featured'),
						'category__not_in' => planet3_0_cat_slug_to_id('media'),
						'posts_per_page' => 4
						); ?>

					<?php /* Start the featured Loop */ 
					$featured_query = new WP_Query( $args );
					while ( $featured_query -> have_posts() ) : $featured_query -> the_post();
						if (in_array($post->ID, $do_not_duplicate)) continue; ?>
						<?php get_template_part( 'content', 'fp' ); ?>
					<?php endwhile; ?>
				</div><!-- #featured -->
			</div><!-- row -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>


		<?php if ( have_posts() ) : ?>
			<div class="row">
				<div id="beyond" class="large-10 large-centered columns" role="main">
					<h1>Beyond</h1>
					<?php $args = array(
						'category__in' => planet3_0_cat_slug_to_id('beyond-planet-three'),
						'posts_per_page' => 5
						); ?>
					<?php /* Start the beyond Loop */ 
					rewind_posts();
					query_posts( $args );
					while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'fp' ); ?>
					<?php endwhile; ?>
				</div><!-- #featured -->
			</div><!-- row -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>


	</div><!-- #primary -->

<?php get_footer(); ?>