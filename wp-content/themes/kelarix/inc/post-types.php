<?php
/**
 * Custom Post Types for the growable, dashboard-managed lists.
 * Using CPTs lets the client add/remove/reorder items without the ACF
 * Pro "repeater" field — fully possible on ACF Free.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'kelarix_register_post_types' );
function kelarix_register_post_types() {

	$common = array(
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes' ),
		'menu_position'       => 25,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
	);

	// Systems We Build.
	register_post_type( 'kx_system', array_merge( $common, array(
		'labels'        => kelarix_pt_labels( 'System', 'Systems' ),
		'menu_icon'     => 'dashicons-screenoptions',
		'menu_position' => 21,
	) ) );

	// Industries.
	register_post_type( 'kx_industry', array_merge( $common, array(
		'labels'        => kelarix_pt_labels( 'Industry', 'Industries' ),
		'menu_icon'     => 'dashicons-building',
		'menu_position' => 22,
	) ) );

	// Proof cases.
	register_post_type( 'kx_proof', array_merge( $common, array(
		'labels'        => kelarix_pt_labels( 'Proof Case', 'Proof Cases' ),
		'menu_icon'     => 'dashicons-chart-line',
		'menu_position' => 23,
	) ) );

	// Process steps.
	register_post_type( 'kx_process', array_merge( $common, array(
		'labels'        => kelarix_pt_labels( 'Process Step', 'Process Steps' ),
		'menu_icon'     => 'dashicons-randomize',
		'menu_position' => 24,
	) ) );
}

/**
 * Build a labels array for a CPT.
 */
function kelarix_pt_labels( $singular, $plural ) {
	return array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'add_new_item'       => 'Add New ' . $singular,
		'edit_item'          => 'Edit ' . $singular,
		'new_item'           => 'New ' . $singular,
		'view_item'          => 'View ' . $singular,
		'search_items'       => 'Search ' . $plural,
		'not_found'          => 'No ' . strtolower( $plural ) . ' found',
		'all_items'          => $plural,
		'menu_name'          => $plural,
	);
}
