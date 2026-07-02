<?php
/**
 * Front page — assembles the homepage from section parts.
 *
 * @package Kelarix
 */

get_header();

$sections = array(
	'hero',
	'blind-spots',
	'layers',
	'systems',
	'industries',
	'confidential',
	'proof',
	'process',
	'discipline',
	'final-cta',
);

foreach ( $sections as $section ) {
	get_template_part( 'template-parts/home/' . $section );
}

get_footer();
