<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

	<nav id="site-navigation" class="navigation-main" role="navigation">

		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		<?php //get_search_form(); ?>
	</nav><!-- #site-navigation -->

	<header id="masthead" class="row" role="banner">
		<div class="page-header large-9 columns">
			<?php  // if this is a single post/page display title
				if ( !is_single() && !is_page() or is_attachment() ) { ?>

					<hgroup>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>

				<?php } // else display site title and description
				else { ?>

					<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php } // endif ?>
		</div><!-- .page-header -->
		<div class="header-logo large-3 columns hide-for-small">
			<img src="<?php echo get_template_directory_uri(); ?>/logo.png" width="125" alt="Logo">
		</div><!-- .header-logo .small-3 -->
	</header><!-- #masthead -->


	<div id="main" class="site-main">
