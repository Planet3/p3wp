<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to planet3_0_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>

<div id="comments" class="comments-area large-10 columns">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text">Comment navigation</h1>
			<div class="previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
			<div class="next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
		</nav><!-- #comment-nav-before -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				$comments = get_comments( array( 
					'order' => 'ASC',
					'post_id' => get_the_ID(),
					'meta_query' => array(
						'relation' => 'OR',
						array( // Select comments that don't have the 'shadow' p3_comment_status meta
							'key' => 'p3_comment_status',
							'value' => 'shadow',
							'compare' => '!='
						),
						array( // Select comments that don't have the p3_comment_status set
							'key' => 'p3_comment_status',
							'compare' => 'NOT EXISTS',
							'value' => ''
						)
					)
				) );

				/* Loop through and list the non shadow comments. Tell wp_list_comments()
				 * to use planet3_0_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define planet3_0_comment() and that will be used instead.
				 * See planet3_0_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'planet3_0_comment' ), $comments );
			?>
		</ol><!-- .comment-list -->
		<h1>Shadow comments!!!</h1>
		<ol class="comment-list shadow-comments">
			<?php
				$comments = get_comments( array( 
					'order' => 'ASC',
					'post_id' => get_the_ID(),
					'meta_query' => array(
						array( // Select comments that don't have the 'shadow' p3_comment_status meta
							'key' => 'p3_comment_status',
							'value' => 'shadow',
							'compare' => '='
						)
					)
				) );

				/* Loop through and list the shadow comments. Tell wp_list_comments()
				 * to use planet3_0_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define planet3_0_comment() and that will be used instead.
				 * See planet3_0_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'planet3_0_comment' ), $comments );
			?>
		</ol><!-- .shadow-comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text">Comment navigation</h1>
			<div class="previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
			<div class="next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments">Comments are closed.</p>
	<?php endif; ?>

	<?php get_sidebar( 'comments' ); ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
