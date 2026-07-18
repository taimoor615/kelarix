<?php
/**
 * Helpers — make ACF optional so the theme renders with design defaults
 * even before the ACF Free plugin is installed.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get an ACF field value with a fallback default.
 *
 * @param string     $selector ACF field name.
 * @param mixed      $default  Value to use when ACF is missing/empty.
 * @param int|bool   $post_id  Optional post/options ID.
 * @return mixed
 */
function k_field( $selector, $default = '', $post_id = false ) {
	if ( function_exists( 'get_field' ) ) {
		$val = get_field( $selector, $post_id );
		if ( null !== $val && '' !== $val && false !== $val && array() !== $val ) {
			return $val;
		}
	}
	return $default;
}

/**
 * Echo an ACF field, escaped for HTML text.
 */
function k_text( $selector, $default = '', $post_id = false ) {
	echo esc_html( k_field( $selector, $default, $post_id ) );
}

/**
 * Echo an ACF field allowing safe inline HTML (headings with <br>, <span>).
 */
function k_html( $selector, $default = '', $post_id = false ) {
	echo wp_kses_post( k_field( $selector, $default, $post_id ) );
}

/**
 * Resolve an ACF image field to a URL, with a dummy fallback.
 *
 * @param string   $selector ACF field name.
 * @param string   $default  Fallback URL (defaults to a bundled placeholder).
 * @param string   $size     Image size.
 * @param int|bool $post_id  Optional post/options ID.
 * @return string
 */
function k_image_url( $selector, $default = '', $size = 'large', $post_id = false ) {
	if ( function_exists( 'get_field' ) ) {
		$img = get_field( $selector, $post_id );
		if ( is_array( $img ) ) {
			return ! empty( $img['sizes'][ $size ] ) ? $img['sizes'][ $size ] : ( $img['url'] ?? '' );
		}
		if ( is_numeric( $img ) ) {
			$url = wp_get_attachment_image_url( $img, $size );
			if ( $url ) {
				return $url;
			}
		}
		if ( is_string( $img ) && $img ) {
			return $img;
		}
	}
	return $default ? $default : k_placeholder();
}

/**
 * Path to a bundled dummy placeholder image.
 */
function k_placeholder( $name = 'placeholder.svg' ) {
	return KELARIX_URI . '/assets/images/' . $name;
}

/**
 * Build an array of items from a CPT, falling back to a provided default array
 * when there are no published posts yet (so the design shows immediately).
 *
 * @param string $post_type CPT slug.
 * @param array  $defaults  Default items used when no posts exist.
 * @param int    $limit     Max posts.
 * @return array  Array of WP_Post objects OR the defaults array.
 */
function k_cpt_items( $post_type, $defaults = array(), $limit = -1 ) {
	$posts = get_posts( array(
		'post_type'      => $post_type,
		'posts_per_page' => $limit,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	) );
	return ! empty( $posts ) ? $posts : $defaults;
}

/**
 * Render a button from an ACF link field (or defaults).
 *
 * @param string $selector ACF link field name.
 * @param string $def_text Default label.
 * @param string $def_url  Default URL.
 * @param string $classes  Button classes.
 */
function k_button( $selector, $def_text = 'Learn more', $def_url = '#', $classes = 'btn btn--primary', $arrow = true ) {
	$link   = k_field( $selector, array() );
	$text   = ! empty( $link['title'] ) ? $link['title'] : $def_text;
	$url    = ! empty( $link['url'] ) ? $link['url'] : $def_url;
	$target = ! empty( $link['target'] ) ? $link['target'] : '';
	printf(
		'<a class="%s" href="%s"%s><span>%s</span>%s</a>',
		esc_attr( $classes ),
		esc_url( $url ),
		$target ? ' target="' . esc_attr( $target ) . '"' : '',
		esc_html( $text ),
		$arrow ? k_arrow() : ''
	);
}

/**
 * Circular arrow used inside buttons.
 */
function k_arrow() {
	return '<span class="btn__arrow" aria-hidden="true"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>';
}

/**
 * Render an inline SVG icon by name from /assets/images/icons/.
 * Falls back to a default square glyph when the file is missing.
 */
function k_icon( $name = 'default' ) {
	$file = KELARIX_DIR . '/assets/images/icons/' . sanitize_file_name( $name ) . '.svg';
	if ( file_exists( $file ) ) {
		return file_get_contents( $file ); // phpcs:ignore
	}
	return '<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="4"/></svg>';
}

/**
 * Site Settings page — a private Page created once, used to hold ACF-editable
 * footer + global site settings. Auto-created if missing.
 */
function kelarix_settings_page_id() {
	static $id = null;
	if ( null !== $id ) {
		return $id;
	}
	$page = get_page_by_path( 'site-settings' );
	if ( ! $page ) {
		$new_id = wp_insert_post( array(
			'post_type'    => 'page',
			'post_title'   => 'Site Settings',
			'post_name'    => 'site-settings',
			'post_status'  => 'private',
			'post_content' => '',
		) );
		$id = $new_id && ! is_wp_error( $new_id ) ? $new_id : 0;
	} else {
		$id = $page->ID;
	}
	return $id;
}

/**
 * Read an ACF field from the Site Settings page with a default fallback.
 */
function k_setting( $key, $default = '' ) {
	$id = kelarix_settings_page_id();
	if ( ! $id ) {
		return $default;
	}
	return k_field( $key, $default, $id );
}
