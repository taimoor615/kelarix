<?php
/**
 * Kelarix — Programmatic ACF field-group registration.
 *
 * All Homepage, About Us, Industries page content, plus CPT (kx_system,
 * kx_industry, kx_proof, kx_process) field groups are declared here.
 *
 * Just requires ACF Free (>= 6.0). On plugin activation these groups appear
 * in the WordPress dashboard under ACF → Field Groups automatically.
 * Tabs render on the LEFT for a cleaner editor UI.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* -----------------------------------------------------------------------
 *  Helper builders — keep field definitions terse and readable.
 * ----------------------------------------------------------------------- */

/** Tab (left-placed) */
function kacf_tab( $slug, $label ) {
	return array(
		'key'       => 'field_kx_' . $slug . '_tab',
		'label'     => $label,
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'left',
		'endpoint'  => 0,
	);
}

/** Text field with optional default */
function kacf_text( $name, $label, $default = '' ) {
	return array(
		'key'           => 'field_kx_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'text',
		'default_value' => $default,
	);
}

/** Textarea, 3 rows */
function kacf_textarea( $name, $label, $default = '', $rows = 3 ) {
	return array(
		'key'           => 'field_kx_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'textarea',
		'rows'          => $rows,
		'default_value' => $default,
	);
}

/** Image (returns URL string) */
function kacf_image( $name, $label ) {
	return array(
		'key'           => 'field_kx_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'image',
		'return_format' => 'url',
		'preview_size'  => 'medium',
	);
}

/** WP-native Link field (returns { title, url, target } array) */
function kacf_link( $name, $label ) {
	return array(
		'key'           => 'field_kx_' . $name,
		'label'         => $label,
		'name'          => $name,
		'type'          => 'link',
		'return_format' => 'array',
	);
}

/** True/False toggle */
function kacf_bool( $name, $label, $instructions = '' ) {
	return array(
		'key'          => 'field_kx_' . $name,
		'label'        => $label,
		'name'         => $name,
		'type'         => 'true_false',
		'ui'           => 1,
		'instructions' => $instructions,
	);
}

/** Group with title + text sub-fields (common card pattern) */
function kacf_card( $name, $label ) {
	return array(
		'key'        => 'field_kx_' . $name,
		'label'      => $label,
		'name'       => $name,
		'type'       => 'group',
		'layout'     => 'block',
		'sub_fields' => array(
			array( 'key' => 'field_kx_' . $name . '_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_kx_' . $name . '_text',  'label' => 'Text',  'name' => 'text',  'type' => 'textarea', 'rows' => 3 ),
		),
	);
}

/** Group with title + text + icon sub-fields */
function kacf_card_icon( $name, $label, $icon_hint = '' ) {
	return array(
		'key'        => 'field_kx_' . $name,
		'label'      => $label,
		'name'       => $name,
		'type'       => 'group',
		'layout'     => 'block',
		'sub_fields' => array(
			array( 'key' => 'field_kx_' . $name . '_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
			array( 'key' => 'field_kx_' . $name . '_text',  'label' => 'Text',  'name' => 'text',  'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_kx_' . $name . '_icon',  'label' => 'Icon key', 'name' => 'icon', 'type' => 'text', 'instructions' => $icon_hint ?: 'Icon slug (see docs)' ),
		),
	);
}

/** Group with tag + title (Proof / Featured proof card pattern) */
function kacf_card_tag_title( $name, $label ) {
	return array(
		'key'        => 'field_kx_' . $name,
		'label'      => $label,
		'name'       => $name,
		'type'       => 'group',
		'layout'     => 'block',
		'sub_fields' => array(
			array( 'key' => 'field_kx_' . $name . '_tag',   'label' => 'Tag',   'name' => 'tag',   'type' => 'text' ),
			array( 'key' => 'field_kx_' . $name . '_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
		),
	);
}

/**
 * Make every field key unique per group (ACF rejects duplicate keys silently).
 * Adds a group prefix to `key` recursively, leaves `name` alone.
 */
function kelarix_prefix_field_keys( array $fields, $prefix ) {
	foreach ( $fields as &$field ) {
		if ( isset( $field['key'] ) && strpos( $field['key'], 'field_kx_' ) === 0 ) {
			$field['key'] = 'field_kx_' . $prefix . '_' . substr( $field['key'], strlen( 'field_kx_' ) );
		}
		if ( isset( $field['sub_fields'] ) && is_array( $field['sub_fields'] ) ) {
			$field['sub_fields'] = kelarix_prefix_field_keys( $field['sub_fields'], $prefix );
		}
	}
	return $fields;
}

/* -----------------------------------------------------------------------
 *  Register all field groups. Using acf/include_fields for reliability.
 * ----------------------------------------------------------------------- */

add_action( 'acf/include_fields', 'kelarix_register_all_acf' );

/**
 * One-time sync: copy local (PHP-registered) field groups into the WP database
 * so they appear in ACF → Field Groups admin list and can be edited from UI.
 *
 * Runs only once per theme version. To re-sync (after adding new fields in PHP)
 * bump KELARIX_VERSION — sync fires again.
 *
 * NOTE: DB copy becomes the source of truth. Edits made in ACF admin persist,
 * edits made in acf-fields.php only apply if you delete the DB group first
 * or bump KELARIX_VERSION AND remove the sync flag.
 */
add_action( 'admin_init', 'kelarix_sync_local_acf_to_db' );
function kelarix_sync_local_acf_to_db() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	if ( ! function_exists( 'acf_get_local_field_groups' ) ) {
		return;
	}
	// Only run once per theme version.
	if ( get_option( 'kelarix_acf_sync_version' ) === KELARIX_VERSION ) {
		return;
	}

	$groups = acf_get_local_field_groups();
	foreach ( $groups as $group ) {
		// Skip if a DB field group with this key already exists.
		$existing = get_posts( array(
			'post_type'      => 'acf-field-group',
			'post_status'    => array( 'publish', 'acf-disabled' ),
			'name'           => $group['key'],
			'posts_per_page' => 1,
			'fields'         => 'ids',
		) );
		if ( ! empty( $existing ) ) {
			continue;
		}

		$fields = acf_get_local_fields( $group['key'] );

		$group_to_save           = $group;
		$group_to_save['ID']     = 0;
		$group_to_save['fields'] = $fields;
		unset( $group_to_save['local'] );

		acf_update_field_group( $group_to_save );
	}

	update_option( 'kelarix_acf_sync_version', KELARIX_VERSION );
}
function kelarix_register_all_acf() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	kelarix_acf_homepage();
	kelarix_acf_about();
	kelarix_acf_industries();
	kelarix_acf_cpt_system();
	kelarix_acf_cpt_industry();
	kelarix_acf_cpt_proof();
	kelarix_acf_cpt_process();
}

/* =======================================================================
 *  1. Homepage Content — Front Page location
 * ======================================================================= */
function kelarix_acf_homepage() {
	$fields = array();

	/* --- Hero --- */
	$fields[] = kacf_tab( 'hero', 'Hero' );
	$fields[] = kacf_text( 'hero_eyebrow', 'Eyebrow Text', 'Strategy led. Engineering backed. Built for operational clarity' );
	$fields[] = kacf_textarea( 'hero_heading', 'Heading', 'Systems that help leaders see clearly, decide faster, and execute with control.' );
	$fields[] = kacf_textarea( 'hero_subtext', 'Subtext', 'Kelarix designs and builds data driven systems that turn scattered data, manual workflows, and operational complexity into better business visibility and execution.' );
	$fields[] = kacf_image( 'hero_image', 'Hero Image' );
	$fields[] = kacf_link( 'hero_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'hero_cta_secondary', 'Secondary CTA' );
	$fields[] = kacf_text( 'hero_note', 'Shield Note', 'For businesses operating in complex, high pressure industries.' );

	/* --- Blind Spots --- */
	$fields[] = kacf_tab( 'blind', 'Blind Spots' );
	$fields[] = kacf_text( 'blind_badge', 'Badge', 'Key Problems' );
	$fields[] = kacf_textarea( 'blind_heading', 'Heading', 'Growth creates blind spots when systems do not scale with the business.' );
	$fields[] = kacf_textarea( 'blind_text', 'Body Text', 'As businesses grow, data spreads across tools, workflows become manual, reporting slows down, and leadership loses the visibility needed to make confident decisions.' );
	$fields[] = kacf_link( 'blind_cta', 'CTA Link' );
	for ( $i = 1; $i <= 5; $i++ ) {
		$fields[] = kacf_card_icon( 'blind_card_' . $i, 'Problem Card ' . $i, 'Icon: scatter, clipboard, clock, workflow, ai' );
	}

	/* --- Layers --- */
	$fields[] = kacf_tab( 'layers', 'Layers (What Kelarix Does)' );
	$fields[] = kacf_text( 'layers_badge', 'Badge', 'What Kelarix Does' );
	$fields[] = kacf_textarea( 'layers_heading', 'Heading' );
	$fields[] = kacf_textarea( 'layers_text', 'Body Text' );
	for ( $i = 1; $i <= 5; $i++ ) {
		$fields[] = kacf_card( 'layer_card_' . $i, 'Layer Card ' . $i );
	}

	/* --- Systems We Build --- */
	$fields[] = kacf_tab( 'systems', 'Systems We Build' );
	$fields[] = kacf_text( 'systems_heading_badge', 'Badge', 'Systems We Build' );
	$fields[] = kacf_text( 'systems_heading', 'Heading', 'Systems We Build' );
	$fields[] = kacf_textarea( 'systems_text', 'Body Text' );

	/* --- Industries --- */
	$fields[] = kacf_tab( 'ind', 'Industries' );
	$fields[] = kacf_text( 'industries_badge', 'Badge', 'Industry Focus' );
	$fields[] = kacf_textarea( 'industries_heading', 'Heading' );
	$fields[] = kacf_textarea( 'industries_text', 'Body Text' );
	$fields[] = kacf_text( 'also_heading', 'Also Heading', 'Also relevant for complex operating environments' );

	/* --- Confidential --- */
	$fields[] = kacf_tab( 'conf', 'Confidential' );
	$fields[] = kacf_text( 'conf_badge', 'Badge', 'How it work' );
	$fields[] = kacf_textarea( 'conf_heading', 'Heading' );
	$fields[] = kacf_textarea( 'conf_text', 'Paragraph 1' );
	$fields[] = kacf_textarea( 'conf_text2', 'Paragraph 2' );
	for ( $i = 1; $i <= 5; $i++ ) {
		$fields[] = kacf_card( 'conf_card_' . $i, 'Confidential Card ' . $i );
	}

	/* --- Proof --- */
	$fields[] = kacf_tab( 'proof', 'Proof (Featured)' );
	$fields[] = kacf_text( 'proof_badge', 'Badge', 'Featured Proof' );
	$fields[] = kacf_textarea( 'proof_heading', 'Heading' );
	$fields[] = kacf_textarea( 'proof_text', 'Body Text' );

	/* --- Process --- */
	$fields[] = kacf_tab( 'process', 'Process' );
	$fields[] = kacf_text( 'process_badge', 'Badge', 'Process' );
	$fields[] = kacf_textarea( 'process_heading', 'Heading' );
	$fields[] = kacf_textarea( 'process_text', 'Body Text' );

	/* --- Discipline --- */
	$fields[] = kacf_tab( 'discipline', 'Discipline (Our Value)' );
	$fields[] = kacf_text( 'discipline_badge', 'Badge', 'Our Value' );
	$fields[] = kacf_textarea( 'discipline_heading', 'Heading' );
	$fields[] = kacf_textarea( 'discipline_text', 'Body Text' );
	for ( $i = 1; $i <= 7; $i++ ) {
		$fields[] = kacf_card( 'discipline_item_' . $i, 'Discipline Item ' . $i );
	}

	/* --- Final CTA --- */
	$fields[] = kacf_tab( 'final', 'Final CTA' );
	$fields[] = kacf_textarea( 'final_heading', 'Heading' );
	$fields[] = kacf_textarea( 'final_text', 'Subtext' );
	$fields[] = kacf_link( 'final_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'final_cta_secondary', 'Secondary CTA' );

	$fields = kelarix_prefix_field_keys( $fields, 'hp' );

	acf_add_local_field_group( array(
		'key'                   => 'group_kelarix_homepage',
		'title'                 => 'Homepage Content',
		'fields'                => $fields,
		'location'              => array(
			array( array( 'param' => 'page_type', 'operator' => '==', 'value' => 'front_page' ) ),
		),
		'menu_order'            => 0,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
}

/* =======================================================================
 *  2. About Page Content
 * ======================================================================= */
function kelarix_acf_about() {
	$fields = array();

	/* Hero */
	$fields[] = kacf_tab( 'ah', 'Hero' );
	$fields[] = kacf_text( 'about_hero_eyebrow', 'Eyebrow', 'Built for leaders operating in complex, high pressure industries' );
	$fields[] = kacf_textarea( 'about_hero_heading', 'Heading', 'Built to bring clarity, control, and intelligence to business operations.' );
	$fields[] = kacf_textarea( 'about_hero_subtext', 'Subtext' );
	$fields[] = kacf_image( 'about_hero_image', 'Hero Image' );
	$fields[] = kacf_link( 'about_hero_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'about_hero_cta_secondary', 'Secondary CTA' );
	$fields[] = kacf_text( 'about_hero_note', 'Shield Note' );

	/* Why */
	$fields[] = kacf_tab( 'aw', 'Why Kelarix Exists' );
	$fields[] = kacf_text( 'why_badge', 'Badge', 'Why Kelarix Exists' );
	$fields[] = kacf_textarea( 'why_heading', 'Heading' );
	$fields[] = kacf_textarea( 'why_text_1', 'Paragraph 1' );
	$fields[] = kacf_textarea( 'why_text_2', 'Paragraph 2' );
	$fields[] = kacf_textarea( 'why_text_3', 'Paragraph 3' );
	$fields[] = kacf_textarea( 'why_quote', 'Dark Quote Card' );

	/* POV */
	$fields[] = kacf_tab( 'ap', 'Point of View' );
	$fields[] = kacf_text( 'pov_badge', 'Badge', 'Our Point of View' );
	$fields[] = kacf_textarea( 'pov_heading', 'Heading' );
	$fields[] = kacf_textarea( 'pov_text', 'Body Text' );
	for ( $i = 1; $i <= 5; $i++ ) {
		$fields[] = kacf_card_icon( 'pov_card_' . $i, 'POV Card ' . $i, 'Icon: scatter, clipboard, clock, workflow, ai' );
	}

	/* Strategy */
	$fields[] = kacf_tab( 'as', 'Strategy & Execution' );
	$fields[] = kacf_text( 'strat_badge', 'Badge', 'Strategy & Engineering-backed' );
	$fields[] = kacf_textarea( 'strat_heading', 'Heading' );
	$fields[] = kacf_textarea( 'strat_text', 'Body Text' );
	for ( $i = 1; $i <= 3; $i++ ) {
		$fields[] = kacf_card( 'strat_card_' . $i, 'Strategy Card ' . $i );
	}
	$fields[] = kacf_link( 'strat_cta', '4th CTA Card' );

	/* Path */
	$fields[] = kacf_tab( 'apath', 'Structured Path' );
	$fields[] = kacf_text( 'path_badge', 'Badge', 'How We Work' );
	$fields[] = kacf_textarea( 'path_heading', 'Heading' );
	$fields[] = kacf_textarea( 'path_text', 'Body Text' );
	$fields[] = kacf_link( 'path_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'path_cta_secondary', 'Secondary CTA' );

	/* Discipline */
	$fields[] = kacf_tab( 'adisc', 'Our Discipline' );
	$fields[] = kacf_text( 'about_disc_badge', 'Badge', 'Our Discipline' );
	$fields[] = kacf_textarea( 'about_disc_heading', 'Heading' );
	$fields[] = kacf_textarea( 'about_disc_text', 'Body Text' );
	for ( $i = 1; $i <= 8; $i++ ) {
		$fields[] = kacf_card( 'about_disc_item_' . $i, 'Discipline Item ' . $i );
	}
	$fields[] = kacf_link( 'about_disc_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'about_disc_cta_secondary', 'Secondary CTA' );

	/* Different */
	$fields[] = kacf_tab( 'adiff', 'What Makes Kelarix Different' );
	$fields[] = kacf_text( 'diff_badge', 'Badge', 'What Makes Kelarix Different' );
	$fields[] = kacf_textarea( 'diff_heading', 'Heading' );
	$fields[] = kacf_textarea( 'diff_text', 'Body Text' );
	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = kacf_card( 'diff_item_' . $i, 'Differentiator ' . $i );
	}

	/* Final */
	$fields[] = kacf_tab( 'afin', 'Final CTA' );
	$fields[] = kacf_textarea( 'about_final_heading', 'Heading' );
	$fields[] = kacf_textarea( 'about_final_text', 'Subtext' );
	$fields[] = kacf_link( 'about_final_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'about_final_cta_secondary', 'Secondary CTA' );

	$fields = kelarix_prefix_field_keys( $fields, 'ab' );

	acf_add_local_field_group( array(
		'key'                   => 'group_kelarix_about',
		'title'                 => 'About Page Content',
		'fields'                => $fields,
		'location'              => array(
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-about.php' ) ),
		),
		'menu_order'            => 1,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
}

/* =======================================================================
 *  3. Industries Page Content
 * ======================================================================= */
function kelarix_acf_industries() {
	$fields = array();

	/* Hero */
	$fields[] = kacf_tab( 'ih', 'Hero' );
	$fields[] = kacf_text( 'ind_hero_eyebrow', 'Eyebrow', 'Built for complex operating environments.' );
	$fields[] = kacf_textarea( 'ind_hero_heading', 'Heading', 'Industries where visibility, control, and execution matter.' );
	$fields[] = kacf_textarea( 'ind_hero_subtext', 'Subtext' );
	$fields[] = kacf_image( 'ind_hero_image', 'Hero Image' );
	$fields[] = kacf_link( 'ind_hero_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'ind_hero_cta_secondary', 'Secondary CTA' );
	$fields[] = kacf_text( 'ind_hero_note', 'Shield Note' );

	/* Radial */
	$fields[] = kacf_tab( 'ir', 'Radial Diagram' );
	$fields[] = kacf_text( 'radial_label_top', 'Top Label', 'Visibility' );
	$fields[] = kacf_text( 'radial_label_right', 'Right Label', 'Data Quality' );
	$fields[] = kacf_text( 'radial_label_bottom', 'Bottom Label', 'Execution Discipline' );
	$fields[] = kacf_text( 'radial_label_left', 'Left Label', 'Workflow Control' );
	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = array(
			'key'        => 'field_kx_radial_card_' . $i,
			'label'      => 'Radial Node ' . $i,
			'name'       => 'radial_card_' . $i,
			'type'       => 'group',
			'layout'     => 'block',
			'sub_fields' => array(
				array( 'key' => 'field_kx_radial_card_' . $i . '_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
				array( 'key' => 'field_kx_radial_card_' . $i . '_icon',  'label' => 'Icon', 'name' => 'icon', 'type' => 'text', 'instructions' => 'store | basket | coin | health' ),
			),
		);
	}

	/* Better systems */
	$fields[] = kacf_tab( 'ib', 'Better Systems' );
	$fields[] = kacf_text( 'better_badge', 'Badge', 'Why Industry Context Matters' );
	$fields[] = kacf_textarea( 'better_heading', 'Heading' );
	$fields[] = kacf_textarea( 'better_text_1', 'Paragraph 1' );
	$fields[] = kacf_textarea( 'better_text_2', 'Paragraph 2' );
	$fields[] = kacf_textarea( 'better_quote', 'Quote Card' );

	/* Focus */
	$fields[] = kacf_tab( 'if', 'Industry Focus' );
	$fields[] = kacf_text( 'focus_badge', 'Badge', 'Industry Focus' );
	$fields[] = kacf_textarea( 'focus_heading', 'Heading' );
	$fields[] = kacf_textarea( 'focus_text', 'Body Text' );

	/* Different */
	$fields[] = kacf_tab( 'idiff', 'Common Operating Problems' );
	$fields[] = kacf_text( 'diff_badge', 'Badge', 'Common Operating Problems' );
	$fields[] = kacf_textarea( 'diff_heading', 'Heading' );
	$fields[] = kacf_textarea( 'diff_text', 'Body Text' );
	$fields[] = kacf_link( 'diff_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'diff_cta_secondary', 'Secondary CTA' );
	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = kacf_card( 'diff_item_' . $i, 'Problem Card ' . $i );
	}

	/* Helps */
	$fields[] = kacf_tab( 'ihelps', 'How Kelarix Helps' );
	$fields[] = kacf_text( 'helps_badge', 'Badge', 'How Kelarix Helps' );
	$fields[] = kacf_textarea( 'helps_heading', 'Heading' );
	$fields[] = kacf_textarea( 'helps_text', 'Body Text' );
	for ( $i = 1; $i <= 6; $i++ ) {
		$fields[] = kacf_card( 'helps_card_' . $i, 'Helps Card ' . $i );
	}

	/* Also */
	$fields[] = kacf_tab( 'ialso', 'Also Relevant' );
	$fields[] = kacf_textarea( 'also_heading', 'Heading' );
	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = kacf_card_icon( 'also_item_' . $i, 'Also Item ' . $i, 'truck | gear | home | bolt' );
	}
	$fields[] = kacf_link( 'also_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'also_cta_secondary', 'Secondary CTA' );

	/* Featured Proof */
	$fields[] = kacf_tab( 'ip', 'Featured Proof' );
	$fields[] = kacf_text( 'ip_badge', 'Badge', 'Featured Proof' );
	$fields[] = kacf_textarea( 'ip_heading', 'Heading' );
	$fields[] = kacf_textarea( 'ip_text', 'Body Text' );
	for ( $i = 1; $i <= 4; $i++ ) {
		$fields[] = kacf_card_tag_title( 'ip_card_' . $i, 'Proof Card ' . $i );
	}

	/* Our Value */
	$fields[] = kacf_tab( 'iv', 'Our Value' );
	$fields[] = kacf_text( 'value_badge', 'Badge', 'Our Value' );
	$fields[] = kacf_textarea( 'value_heading', 'Heading' );
	$fields[] = kacf_textarea( 'value_text', 'Body Text' );
	for ( $i = 1; $i <= 7; $i++ ) {
		$fields[] = kacf_card( 'value_item_' . $i, 'Value Item ' . $i );
	}

	/* Final */
	$fields[] = kacf_tab( 'ifin', 'Final CTA' );
	$fields[] = kacf_textarea( 'ind_final_heading', 'Heading' );
	$fields[] = kacf_textarea( 'ind_final_text', 'Subtext' );
	$fields[] = kacf_link( 'ind_final_cta_primary', 'Primary CTA' );
	$fields[] = kacf_link( 'ind_final_cta_secondary', 'Secondary CTA' );

	$fields = kelarix_prefix_field_keys( $fields, 'in' );

	acf_add_local_field_group( array(
		'key'                   => 'group_kelarix_industries',
		'title'                 => 'Industries Page Content',
		'fields'                => $fields,
		'location'              => array(
			array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'page-industries.php' ) ),
		),
		'menu_order'            => 2,
		'position'              => 'normal',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'active'                => true,
	) );
}

/* =======================================================================
 *  4. CPT: kx_system (System Details)
 * ======================================================================= */
function kelarix_acf_cpt_system() {
	acf_add_local_field_group( array(
		'key'      => 'group_kx_system',
		'title'    => 'System Details',
		'fields'   => array(
			kacf_textarea( 'description', 'Description' ),
			kacf_text( 'icon', 'Icon Key', 'scatter' ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'kx_system' ) ),
		),
		'position' => 'normal',
		'active'   => true,
	) );
}

/* =======================================================================
 *  5. CPT: kx_industry (Industry Details)
 * ======================================================================= */
function kelarix_acf_cpt_industry() {
	acf_add_local_field_group( array(
		'key'      => 'group_kx_industry',
		'title'    => 'Industry Details',
		'fields'   => array(
			kacf_textarea( 'description', 'Description' ),
			kacf_textarea( 'features', 'Features (one per line)' ),
			kacf_image( 'image', 'Image' ),
			kacf_link( 'link', 'Explore Now Link' ),
			kacf_bool( 'is_secondary', 'Is Secondary?', 'Show in "Also relevant" grid instead of main carousel.' ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'kx_industry' ) ),
		),
		'position' => 'normal',
		'active'   => true,
	) );
}

/* =======================================================================
 *  6. CPT: kx_proof (Proof Case Details)
 * ======================================================================= */
function kelarix_acf_cpt_proof() {
	acf_add_local_field_group( array(
		'key'      => 'group_kx_proof',
		'title'    => 'Proof Case Details',
		'fields'   => array(
			kacf_text( 'tag', 'Industry Tag' ),
			kacf_textarea( 'description', 'Description' ),
			kacf_textarea( 'tags', 'Chips (one per line)' ),
			kacf_text( 'stat_label', 'Stat Label', 'Analytics Data' ),
			kacf_text( 'stat_value', 'Stat Value', '94.7%' ),
			kacf_bool( 'is_featured', 'Is Featured?', 'Starts expanded with analytics panel visible.' ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'kx_proof' ) ),
		),
		'position' => 'normal',
		'active'   => true,
	) );
}

/* =======================================================================
 *  7. CPT: kx_process (Process Step Details)
 * ======================================================================= */
function kelarix_acf_cpt_process() {
	acf_add_local_field_group( array(
		'key'      => 'group_kx_process',
		'title'    => 'Process Step Details',
		'fields'   => array(
			kacf_textarea( 'description', 'Description' ),
		),
		'location' => array(
			array( array( 'param' => 'post_type', 'operator' => '==', 'value' => 'kx_process' ) ),
		),
		'position' => 'normal',
		'active'   => true,
	) );
}
