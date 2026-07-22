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

/**
 * Flush rewrite rules once per theme version so /industry/<slug>/ URLs work
 * after CPT visibility changes.
 */
add_action( 'admin_init', 'kelarix_maybe_flush_rewrites' );
function kelarix_maybe_flush_rewrites() {
	if ( get_option( 'kelarix_rewrite_version' ) === KELARIX_VERSION ) {
		return;
	}
	flush_rewrite_rules( false );
	update_option( 'kelarix_rewrite_version', KELARIX_VERSION );
}
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

	// Industries — public so single posts have their own page + editor.
	register_post_type( 'kx_industry', array_merge( $common, array(
		'labels'              => kelarix_pt_labels( 'Industry', 'Industries' ),
		'menu_icon'           => 'dashicons-building',
		'menu_position'       => 22,
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'rewrite'             => array( 'slug' => 'industry', 'with_front' => false ),
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt' ),
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

	// Case Studies — public listing under /case-studies/, single view per post.
	register_post_type( 'kx_case_study', array_merge( $common, array(
		'labels'              => kelarix_pt_labels( 'Case Study', 'Case Studies' ),
		'menu_icon'           => 'dashicons-media-document',
		'menu_position'       => 26,
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => false,
		'rewrite'             => array( 'slug' => 'case-study', 'with_front' => false ),
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
	) ) );

	// Industry taxonomy — filter chips on the case-studies listing page.
	register_taxonomy( 'kx_case_ind', 'kx_case_study', array(
		'labels'            => array(
			'name'          => 'Industries',
			'singular_name' => 'Industry',
			'menu_name'     => 'Industries',
			'all_items'     => 'All Industries',
			'edit_item'     => 'Edit Industry',
			'add_new_item'  => 'Add Industry',
			'new_item_name' => 'New Industry',
		),
		'public'            => true,
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'case-study-industry', 'with_front' => false ),
	) );
}

/**
 * Seed the 4 default industry terms on first activation of the case-study
 * taxonomy. Idempotent — safe to run on every version bump.
 */
add_action( 'init', 'kelarix_seed_case_industries', 20 );
function kelarix_seed_case_industries() {
	if ( ! taxonomy_exists( 'kx_case_ind' ) ) {
		return;
	}
	if ( get_option( 'kelarix_case_ind_seeded' ) === '1' ) {
		return;
	}
	$defaults = array(
		'retail'            => 'Retail',
		'fmcg-food-beverage' => 'FMCG & Food and Beverage',
		'financial-services' => 'Financial Services',
		'healthcare'        => 'Healthcare',
	);
	foreach ( $defaults as $slug => $name ) {
		if ( ! term_exists( $slug, 'kx_case_ind' ) ) {
			wp_insert_term( $name, 'kx_case_ind', array( 'slug' => $slug ) );
		}
	}
	update_option( 'kelarix_case_ind_seeded', '1' );
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
