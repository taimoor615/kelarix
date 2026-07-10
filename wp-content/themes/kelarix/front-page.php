<?php
/**
 * Front page — assembles the homepage from section parts + connector strips.
 *
 * @package Kelarix
 */

get_header();

/**
 * Render a decorative connector strip between two sections.
 *
 * @param string $key Modifier that maps to a background image in CSS.
 */
function kelarix_connector( $key ) {
	printf( '<div class="section-connector section-connector--%s" aria-hidden="true"></div>', esc_attr( $key ) );
}
?>

<div class="hero-block">
	<?php
	get_template_part( 'template-parts/home/hero' );
	get_template_part( 'template-parts/home/blind-spots' );
	?>

	<section class="section layers-head">
		<div class="container">
			<?php get_template_part( 'template-parts/home/layers-head' ); ?>
		</div>
	</section>
</div>

<section class="section layers">
	<div class="layers__bg" aria-hidden="true"></div>
	<div class="container layers__inner">
		<?php get_template_part( 'template-parts/home/layers-cards' ); ?>
	</div>
</section>

<?php
get_template_part( 'template-parts/home/systems' );

get_template_part( 'template-parts/home/industries' );

get_template_part( 'template-parts/home/confidential' );

?>

<div class="proof-block">
	<?php get_template_part( 'template-parts/home/proof' ); ?>
</div>

<?php

get_template_part( 'template-parts/home/process' );

get_template_part( 'template-parts/home/discipline' );
// kelarix_connector( 'process-footer' );

get_template_part( 'template-parts/home/final-cta' );

get_footer();
