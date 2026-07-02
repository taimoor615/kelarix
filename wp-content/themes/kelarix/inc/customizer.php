<?php
/**
 * Customizer — global options (header + footer).
 *
 * ACF Free has no Options page, so site-wide/global values live here instead.
 * Read them anywhere with kelarix_opt( 'key', 'default' ).
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get a Customizer value with a fallback default.
 */
function kelarix_opt( $key, $default = '' ) {
	$val = get_theme_mod( $key, $default );
	return ( '' === $val || null === $val ) ? $default : $val;
}

add_action( 'customize_register', 'kelarix_customize_register' );
function kelarix_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'kelarix_options', array(
		'title'    => __( 'Kelarix Options', 'kelarix' ),
		'priority' => 20,
	) );

	/* Small helper to add a setting + control quickly. */
	$add = function ( $id, $label, $section, $type = 'text', $default = '' ) use ( $wp_customize ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $default,
			'sanitize_callback' => ( 'url' === $type ) ? 'esc_url_raw' : ( ( 'textarea' === $type ) ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $label,
			'section' => $section,
			'type'    => $type,
		) );
	};

	/* ---- Header ---- */
	$wp_customize->add_section( 'kelarix_header', array( 'title' => __( 'Header', 'kelarix' ), 'panel' => 'kelarix_options' ) );
	$add( 'header_cta_text', 'CTA button label', 'kelarix_header', 'text', 'Request a Diagnostic Conversation' );
	$add( 'header_cta_url', 'CTA button URL', 'kelarix_header', 'url', '#contact' );

	/* ---- Footer ---- */
	$wp_customize->add_section( 'kelarix_footer', array( 'title' => __( 'Footer', 'kelarix' ), 'panel' => 'kelarix_options' ) );
	$add( 'footer_about', 'About text', 'kelarix_footer', 'textarea', 'AI agents that automate work, scale operations and give your team time back.' );
	$add( 'footer_linkedin', 'LinkedIn URL', 'kelarix_footer', 'url', '#' );
	$add( 'footer_instagram', 'Instagram URL', 'kelarix_footer', 'url', '#' );
	$add( 'footer_col1_title', 'Column 1 title', 'kelarix_footer', 'text', 'Quick links' );
	$add( 'footer_col2_title', 'Column 2 title', 'kelarix_footer', 'text', "Industry's" );
	$add( 'footer_build_title', 'Build-team title', 'kelarix_footer', 'text', 'Build your team:' );
	$add( 'footer_build_text', 'Build-team text', 'kelarix_footer', 'textarea', 'Get tips, product updates, and insights on working smarter with AI.' );
	$add( 'footer_build_cta_text', 'Build-team button label', 'kelarix_footer', 'text', 'Request a Diagnostic Conversation' );
	$add( 'footer_build_cta_url', 'Build-team button URL', 'kelarix_footer', 'url', '#contact' );
	$add( 'footer_copyright', 'Copyright text (use {year})', 'kelarix_footer', 'text', '© {year} Kelarix. All rights reserved.' );
	$add( 'footer_email_line', 'Bottom-right line', 'kelarix_footer', 'text', 'Build your team: info@kelarix.com' );
}
