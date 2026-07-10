<?php
/**
 * Kelarix theme bootstrap.
 *
 * @package Kelarix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KELARIX_VERSION', '1.7.3' );
define( 'KELARIX_DIR', get_template_directory() );
define( 'KELARIX_URI', get_template_directory_uri() );

require_once KELARIX_DIR . '/inc/theme-setup.php';
require_once KELARIX_DIR . '/inc/enqueue.php';
require_once KELARIX_DIR . '/inc/helpers.php';
require_once KELARIX_DIR . '/inc/post-types.php';
require_once KELARIX_DIR . '/inc/customizer.php';
require_once KELARIX_DIR . '/inc/acf-fields.php';

/*
 * NOTE: ACF field groups are NOT registered in code — they are created manually
 * in the WordPress dashboard (ACF Free) so the field UI stays fully editable.
 * The theme only READS fields via the k_field()/k_text()/... helpers.
 * See KELARIX-CMS-GUIDE.md for exactly which groups/fields to create.
 */
