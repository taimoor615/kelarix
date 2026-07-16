<?php
/**
 * Enqueue styles and scripts.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'kelarix_assets' );
function kelarix_assets() {
	// Google font: Plus Jakarta Sans.
	wp_enqueue_style(
		'kelarix-fonts',
		'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
		array(),
		null
	);

	// Font Awesome (icons).
	wp_enqueue_style(
		'kelarix-fa',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
		array(),
		'6.5.1'
	);

	wp_enqueue_style( 'kelarix-tokens', KELARIX_URI . '/assets/css/tokens.css', array(), KELARIX_VERSION );
	wp_enqueue_style( 'kelarix-main', KELARIX_URI . '/assets/css/main.css', array( 'kelarix-tokens' ), KELARIX_VERSION );

	// Required theme stylesheet (header only).
	wp_enqueue_style( 'kelarix-style', get_stylesheet_uri(), array( 'kelarix-main' ), KELARIX_VERSION );

	wp_enqueue_script( 'kelarix-main', KELARIX_URI . '/assets/js/main.js', array(), KELARIX_VERSION, true );
}
