<?php
/**
 * TSKOne Theme Customizer
 *
 * @package TSKOne
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tskone_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'tskone_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'tskone_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'tskone_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tskone_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tskone_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tskone_customize_preview_js() {
	wp_enqueue_script( 'tskone-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'tskone_customize_preview_js' );

if ( class_exists('Kirki') ) {
	Kirki::add_config( 'tskone_theme', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	Kirki::add_panel( 'theme_mod', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Customisation', 'tskone' ),
	    'description' => esc_html__( 'Customisation of theme', 'tskone' ),
	) );
	Kirki::add_section( 'navbar_section', array(
	    'title'          => esc_html__( 'Navbar Section', 'tskone' ),
	    'description'    => esc_html__( 'change the look & feel of header navbar.', 'tskone' ),
	    'panel'          => 'theme_mod',
	    'priority'       => 160,
	) );
	Kirki::add_field( 'tskone_theme', [
		'type'        => 'checkbox',
		'settings'    => 'sticky_setting',
		'label'       => esc_html__( 'Sticky Header', 'tskone' ),
		'description' => esc_html__( 'Navbar scrolls with the page until it reaches the top, then stays there)', 'tskone' ),
		'section'     => 'navbar_section',
		'default'     => false,
	] );
	Kirki::add_field( 'tskone_theme', [
		'type'        => 'color-palette',
		'settings'    => 'navbar_color',
		'label'       => esc_html__( 'Navbar Color Scheme', 'tskone' ),
		'description' => esc_html__( 'Customise the Navbar Color & Menu Text', 'tskone' ),
		'section'     => 'navbar_section',
		'default'     => '#007BFF',
		'choices'     => [
			'colors' => [ '#007BFF', '#6B757D', '#29A645', '#DC3545', '#FEC105', '#17A2B8', '#F8F9FA', '#343A40' ],
			'style'  => 'round',
			'size'   => 25,
		],
	] );


}
