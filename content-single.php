<?php
/**
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>


<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'post-thumbnail', true ); ?>
		<meta itemprop="image" content="<?php echo $thumb_url[0] ?>" />
	<?php } else { ?>
		<meta itemprop="image" content="<?php echo get_template_directory_uri(); ?>/logo.png" />
	<?php } ?>
	<meta itemprop="description" content="<?php echo wp_kses( get_the_excerpt(), array() ); ?>" />
	<meta itemprop="interactionCount" content="UserComments:<?php echo $post->comment_count; ?>"/>

	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	<meta property="og:description" content="<?php echo wp_kses( get_the_excerpt(), array() ); ?>" />
	<?php if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'post-thumbnail', true ); ?>
		<meta property="og:image" content="<?php echo $thumb_url[0] ?>" />
	<?php } else { ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/logo.png" />
	<?php } ?>

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@planet3org" />
	<meta name="twitter:title" content="<?php the_title(); ?>" />
	<meta name="twitter:description" content="<?php echo wp_kses( get_the_excerpt(), array() ); ?>" />
	<?php if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'post-thumbnail', true ); ?>
		<meta name="twitter:image:src" content="<?php echo $thumb_url[0] ?>" />
	<?php } else { ?>
		<meta name="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/logo.png" />
	<?php } ?>


	<header class="entry-header">
		<h1 itemprop="headline" class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="byline large-2 columns">
		<div class="entry-meta meta-above">
			<span itemprop="datePublished" ><?php planet3_0_posted_on(); ?></span>
		</div><!-- .entry-meta -->
		<div class="author-avatar hide-for-small">
			<?php if ( validate_gravatar( get_the_author_meta( 'user_email' ) ) ) :
				echo get_avatar( get_the_author_meta( 'user_email' ), 256, $default, get_the_author() ); 
			endif; ?>
		</div>
		<h1 itemprop="author" ><?php planet3_0_posted_by(); ?></h1>
			<?php
			// Display Author's discription if it exists
			if ( get_the_author_meta( 'user_description' ) ) : ?>
		<div class="author-bio hide-for-small">
			<p><?php the_author_meta( 'user_description' ); ?></p>
		</div><!-- .author-bio -->
		<?php endif; ?>
	</div><!-- .byline -->

	<div class="article large-10 columns">
		<div class="entry-content">
			<!-- <?php if ( function_exists( 'sharing_display' ) )
				sharing_display( '', true ); ?> -->
			<span itemprop="articleBody"><?php the_content(); ?></span>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta meta-bellow large-12 columns" >
			<?php planet3_0_posted_in(); ?> <?php edit_post_link( 'Edit', '| <span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</div><!-- . large-9 columns -->
</article><!-- #post-## -->
