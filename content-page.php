<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="large-10 large-centered columns">
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<?php edit_post_link( 'Edit', '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
			<hr />
		</div><!-- large-10 large-offset-2 -->

	</div><!-- .row -->
</article><!-- #post-## -->
