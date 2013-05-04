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
	<?php if ( is_admin_bar_showing() ) {?>
		<style>
			.top-bar-container { top: 28px !important; }
		</style>
	<?php }?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

		<div class="top-bar-container antialiased fixed">
			<nav id="site-navigation" class="navigation-main top-bar" role="navivation">
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					</li><!-- .name -->
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul><!-- .title-area -->
				<section class="top-bar-section">
					<?php foundation_top_bar_l(); ?>

					<?php foundation_top_bar_r(); ?>
					<?php //get_search_form(); ?>
				</section><!-- .top-bar-section -->
			</nav><!-- #site-navigation -->
		</div>

	<header id="masthead" class="row" role="banner">
		<div class="page-header large-9 columns">
			<?php  // if this is not a single post/page site title and description
				if ( !is_single() && !is_page() or is_attachment() ) { ?>

					<hgroup class="site-masthead">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>

				<?php } // else display post/page title
				else { ?>

					<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php } // endif ?>
		</div><!-- .page-header -->
		<div class="header-logo large-3 columns hide-for-small">
			<img src="<?php echo get_template_directory_uri(); ?>/logo.png" width="125" alt="Logo">
		</div><!-- .header-logo .small-3 -->
	</header><!-- #masthead -->


	<div id="main" class="site-main">
