<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Skirmish
 * @since Skirmish 2.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php
			if ( has_nav_menu( 'social' ) ) : ?>
				<h1 class="widget-title"><?php esc_html_e( 'Connect', 'skirmish' ); ?></h1>
				<nav id="social-navigation" class="social-links">
					<?php
						// Social links navigation menu.
						wp_nav_menu( array(
							'theme_location' => 'social',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php esc_html_e( 'Archives', 'skirmish' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php esc_html_e( 'Meta', 'skirmish' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
