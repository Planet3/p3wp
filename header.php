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
	</nav><!-- #site-navigation -->


	<?php  // if this is the front page display site title and description
	if (is_front_page()) { ?>

		<header id="masthead" class="site-header" role="banner">
			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
		</header><!-- #masthead -->

	<?php } // else display page title instead and meta instead of site title and description
	else { ?>

		<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta meta-above">
				<?php planet3_0_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

	<?php } // endif ?>

	<div id="main" class="site-main">
