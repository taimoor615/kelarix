<?php
/**
 * Front page — assembles the homepage from section parts + backdrop wrappers.
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
?>

<!-- Backdrop: home-featured-proof-bg.jpg — starts above confidential cards, ends above process -->
<div class="hp-proof-block">
	<?php
	get_template_part( 'template-parts/home/confidential' );
	get_template_part( 'template-parts/home/proof' );
	?>
</div>

<!-- Backdrop: home-footer-bg-img.png — starts above process, ends after Final CTA (before <footer>) -->
<div class="hp-footer-block">
	<?php
	get_template_part( 'template-parts/home/process' );
	get_template_part( 'template-parts/home/discipline' );
	get_template_part( 'template-parts/home/final-cta' );
	?>
</div>

<?php
get_footer();
