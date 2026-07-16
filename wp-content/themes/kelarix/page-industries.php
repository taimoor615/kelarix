<?php
/**
 * Template Name: Industries
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main industries-page">

	<!-- Backdrop 1: top-sections-bg — wraps hero + radial + better-systems head -->
	<div class="ind-top-block">
		<?php
		get_template_part( 'template-parts/industries/hero' );
		get_template_part( 'template-parts/industries/radial' );
		get_template_part( 'template-parts/industries/better-systems-head' );
		?>
	</div>

	<!-- Backdrop 2: industry-focus-section-bg — wraps quote card + industry accordion -->
	<div class="ind-focus-block">
		<?php
		get_template_part( 'template-parts/industries/better-systems-quote' );
		get_template_part( 'template-parts/industries/industry-accordion' );
		?>
	</div>

	<?php
	get_template_part( 'template-parts/industries/different-industries' );
	get_template_part( 'template-parts/industries/how-kelarix-helps' );
	?>

	<!-- Backdrop 3: relevant-bg-footer-cta.png — wraps also-relevant + proof + our-value + final-cta -->
	<div class="ind-footer-block">
		<?php
		get_template_part( 'template-parts/industries/also-relevant' );
		get_template_part( 'template-parts/industries/featured-proof' );
		get_template_part( 'template-parts/industries/our-value' );
		get_template_part( 'template-parts/industries/final-cta' );
		?>
	</div>
</main>
<?php
get_footer();
