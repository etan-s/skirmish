<?php
/**
 * Skirmish Theme Customizer
 *
 * @package skirmish
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skirmish_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	// Add custom description to controls or sections.
	$wp_customize->get_control( 'blogdescription' )->description  = __( 'Tagline is hidden in this theme.', 'skirmish' );

	// Footer credit
	$wp_customize->add_setting( 'skirmish_footer_copyright' , array(
		'sanitize_callback'	=> 'wp_kses_post'
	) );

	$wp_customize->add_control( 'skirmish_footer_copyright', array(
		'label'       => __( 'Footer Copyright', 'skirmish' ),
		'description'	=> esc_html__( 'Customize the footer copyright text. (Some HTML is allowed)', 'skirmish' ),
		'type'        => 'textarea',
		'section'     => 'title_tagline',
		'settings'    => 'skirmish_footer_copyright',
	) );
}
add_action( 'customize_register', 'skirmish_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skirmish_customize_preview_js() {
	wp_enqueue_script( 'skirmish_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skirmish_customize_preview_js' );
