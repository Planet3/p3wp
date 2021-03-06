<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( 'Permalink to %s', the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header><!-- .entry-header -->

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			 <?php the_post_thumbnail(); ?> 
		</div><!-- entry-thumbnail -->
		<?php endif; ?>

		<?php $length = strlen( wp_kses( get_the_excerpt(), array() ) ); ?>
		<div class="entry-summary <?php if ( $length > 300 ) { echo 'bleg-small'; } ?>">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-meta meta-bellow">
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( 'Leave a comment', '1 Comment', '% Comments' ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( 'Edit', '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-## -->
</li>
