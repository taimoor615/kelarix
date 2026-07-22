<?php
/**
 * Single Industry post template (kx_industry CPT).
 *
 * @package Kelarix
 */
get_header();
while ( have_posts() ) :
	the_post();
?>
<main id="primary" class="site-main sind-page">

	<!-- Backdrop 1: overlay-img-hero-3section.png — wraps hero + growth-complexity -->
	<div class="sind-hero-block">
		<?php
		get_template_part( 'template-parts/single-industry/hero' );
		get_template_part( 'template-parts/single-industry/growth-complexity' );
		?>
	</div>

	<!-- Backdrop 2: where-leadership-bg-img.png — problem quote + systems accordion -->
	<div class="sind-leadership-block">
		<?php
		get_template_part( 'template-parts/single-industry/the-problem' );
		?>
	</div>

	<?php get_template_part( 'template-parts/single-industry/systems-accordion' );?>
	<!-- Backdrop 3: leadership-outcomes-bg-img.png — visibility value + better systems -->
	<?php
		get_template_part( 'template-parts/single-industry/visibility-value' );
		?>

	<div class="sind-outcomes-block">
		<?php get_template_part( 'template-parts/single-industry/better-systems' );?>		
	</div>

	<!-- Backdrop 4: scenario-study-bg-img.png — use cases + inventory system panel -->
	<div class="sind-scenario-block">
		<?php
		get_template_part( 'template-parts/single-industry/use-cases' );
		get_template_part( 'template-parts/single-industry/inventory-system' );
		?>
	</div>

	<!-- Backdrop 5: footer-bg-img.png — may-be-relevant + discipline + final CTA -->
	<div class="sind-footer-block">
		<?php
		get_template_part( 'template-parts/single-industry/may-be-relevant' );
		get_template_part( 'template-parts/single-industry/discipline' );
		get_template_part( 'template-parts/single-industry/final-cta' );
		?>
	</div>
</main>
<?php endwhile; get_footer(); ?>
