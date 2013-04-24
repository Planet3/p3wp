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
				<?php /* Start the lede Loop */ 
				query_posts( 'category_name=lede&showposts=1' );
				while ( have_posts() ) : the_post();
					$do_not_duplicate[] = $post->ID; ?>
					<?php get_template_part( 'content', 'fplede' ); ?>
				<?php endwhile; ?>
			</div><!-- #lede -->
		</div><!-- row -->


		<div class="row">
			<div id="featured" class="large-10 large-centered columns" role="main">
				<?php /* Start the featured Loop */ 
				rewind_posts();
				query_posts( 'category_name=featured&showposts=4' );
				while ( have_posts() ) : the_post();
					if (in_array($post->ID, $do_not_duplicate)) continue; ?>
					<?php get_template_part( 'content', 'fp' ); ?>
				<?php endwhile; ?>
			</div><!-- #featured -->
		</div><!-- row -->



		<div class="row">
			<div id="beyond" class="large-10 large-centered columns" role="main">
				<?php /* Start the featured Loop */ 
				rewind_posts();
				query_posts( 'category_name=beyond-planet-three&showposts=5' );
				while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'fp' ); ?>
				<?php endwhile; ?>
			</div><!-- #featured -->
		</div><!-- row -->



	<?php endif; ?>
	</div><!-- #primary -->

<?php get_footer(); ?>