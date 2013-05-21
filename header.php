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
	<!--<?php if ( is_admin_bar_showing() ) {?>
		<style>
			.top-bar-container { top: 28px !important; }
		</style>-->
	<?php }?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>

		<div class="top-bar-container antialiased">
			<nav id="site-navigation" class="navigation-main top-bar" role="navivation">
				<ul class="title-area">
					<li class="name">
						<h1><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/logo.png" width="25" alt="Logo"></a></h1>
					</li><!-- .name -->
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul><!-- .title-area -->
				<section class="top-bar-section">
					<?php foundation_top_bar(); ?>
					<ul class="right">
						<li class="has-form">
							<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'planet3_0' ); ?>" />
							</form>
						</li><!-- .has-form -->
					</ul><!-- .right -->
				</section><!-- .top-bar-section -->
			</nav><!-- #site-navigation -->
		</div>

	<header id="masthead" class="row" role="banner">
		<div class="page-header large-9 columns">
			<?php  // if this is not a single post/page site title and description
				if ( !is_single() && !is_page() or is_attachment() ) { ?>

					<div class="site-masthead">
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> <small class="hide-for-small"><span class="site-description"><?php bloginfo( 'description' ); ?></span></small></a></h1>
						<div class="hide-for-small"><p>ENGAGE THE FUTURE: Honest, wide-ranging, scientifically informed conversation about sustainable technologies and cultures, toward a thriving future</p></div>
					</div>

				<?php } // else display post/page title
				else { ?>

					<h1 class="entry-title"><?php the_title(); ?></h1>

			<?php } // endif ?>
		</div><!-- .page-header -->
		<div class="header-logo large-3 columns hide-for-small" itemscope itemtype="http://schema.org/Organization">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/logo.png" width="125" alt="Logo" itemprop="logo"></a>
		</div><!-- .header-logo .small-3 -->
	</header><!-- #masthead -->


	<div id="main" class="site-main">
