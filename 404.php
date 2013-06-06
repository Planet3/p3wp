<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */

get_header(); ?>

	<div id="primary" class="content-area row">
		<div id="content" class="site-content large-10 large-centered columns" role="main">

			<article id="post-0" class="post error404 not-found">
				<p><img src="<?php echo get_template_directory_uri(); ?>/404ball.jpg" width="447" height="447" alt="404 error" title="Wrong Number!" class="aligncenter"></p>
				<header class="entry-header">
					<h1 class="entry-title">404! That page can&rsquo;t be found.</h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widgettitle">Most Used Categories</h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( 'Try looking in the monthly archives. %1$s', convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>