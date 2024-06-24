<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package skirmish
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function skirmish_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'           => 'click',
		'container'      => 'content',
		'footer_widgets' => 'true',
		'footer'         => 'colophon',
	) );
}
add_action( 'after_setup_theme', 'skirmish_jetpack_setup' );

/**
 * Add theme support for Responsive Videos
 *
 * @since skirmish 1.0
 */
function skirmish_responsive_videos_init() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'skirmish_responsive_videos_init' );

/**
 * gallery widget content width.
 *
 * @since skirmish 1.0
 */
function skirmish_gallery_widget_content_width( $width ) {
	return 740;
}
add_filter( 'gallery_widget_content_width', 'skirmish_gallery_widget_content_width');
