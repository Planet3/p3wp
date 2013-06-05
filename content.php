<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<p><?php planet3_0_posted_on(); ?> by <?php planet3_0_posted_by(); ?></p>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( ! in_category( planet3_0_cat_slug_to_id('media') ) && ! planet3_0_post_is_in_descendant_category( planet3_0_cat_slug_to_id('media') ) ) : ?>
	<div class="entry-summary">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail entry-thumbnail-list">
				<?php the_post_thumbnail(); ?>
			</div><!-- entry-thumbnail -->
		<?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( ' [more]' ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<div class="row">
		<footer class="entry-meta meta-bellow large-12 columns">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php planet3_0_posted_in(); ?>
			<?php endif; // End if 'post' == get_post_type() ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="sep"> | </span>
				<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( 'Edit', '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div><!-- .row -->
</article><!-- #post-## -->