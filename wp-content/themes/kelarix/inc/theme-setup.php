<?php
/**
 * Theme setup: supports, menus, image sizes.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Ensure the private "Site Settings" page exists on admin load (holds Footer ACF fields).
add_action( 'admin_init', 'kelarix_settings_page_id' );

add_action( 'after_setup_theme', 'kelarix_setup' );
function kelarix_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 160,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'kelarix' ),
		'footer'  => __( 'Footer Menu', 'kelarix' ),
	) );
}

/**
 * Admin notice if Advanced Custom Fields (free) is not active.
 * The theme still renders using design defaults, but content won't be editable.
 */
add_action( 'admin_notices', 'kelarix_acf_notice' );
function kelarix_acf_notice() {
	if ( function_exists( 'get_field' ) ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>Kelarix theme:</strong> Install &amp; activate the free <em>Advanced Custom Fields</em> plugin to edit homepage content from the dashboard. Until then, the design defaults are shown.</p></div>';
}
