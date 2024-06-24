<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skirmish
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>

	<div id="page" class="hfeed site">
		<header id="masthead" role="banner">
			<div class="site-header">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					<?php
					$skirmish_description = get_bloginfo( 'description', 'display' );
					if ( $skirmish_description || is_customize_preview() ) {
						?>
						<h2 class="site-description"><?php echo $skirmish_description; /* WPCS: xss ok. */ ?></h2>
					<?php } else { ?>
						<div class="header-spacer"></div>
					<?php } ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation site-navigation" role="navigation">
					<div class="nav-wrap">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'skirmish' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</div><!-- .wrap -->
				</nav><!-- #site-navigation -->

				<?php if ( get_header_image() ) : ?>
					<div class="header-image">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</div><!-- .header-image -->
				<?php endif; // End header image check. ?>
			</div><!-- .site-header -->
		</header><!-- #masthead .site-header -->

		<div id="main">