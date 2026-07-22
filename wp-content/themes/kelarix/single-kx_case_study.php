<?php
/**
 * Single Case Study template (kx_case_study CPT).
 *
 * Uses the same section layout originally built as the standalone Proof page.
 * Each case study post now owns this full-detail view. Template parts and CSS
 * class names stay under the "proof-" prefix so existing styles keep working.
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main proof-page single-case-study">
	<!-- Backdrop 1: hero-btoomt-overlya-img — from hero top to just above Demonstrate section -->
	<div class="proof-top-block">
		<?php
		get_template_part( 'template-parts/proof/hero' );
		get_template_part( 'template-parts/proof/different' );
		?>
	</div>

	<!-- Backdrop 2: how-wedemontrate_case-study-bg — Demonstrate + Case Studies -->
	<div class="proof-mid-block">
		<?php
		get_template_part( 'template-parts/proof/demonstrate' );
		get_template_part( 'template-parts/proof/case-studies' );
		?>
	</div>

	<?php
	get_template_part( 'template-parts/proof/frameworks' );
	get_template_part( 'template-parts/proof/what-proves' );
	?>

	<!-- Backdrop 3: footer-bg-img-proof — from mid of Library to end of Final CTA -->
	<div class="proof-library-block">
		<?php
		get_template_part( 'template-parts/proof/library' );
		get_template_part( 'template-parts/proof/final-cta' );
		?>
	</div>
</main>
<?php
get_footer();
