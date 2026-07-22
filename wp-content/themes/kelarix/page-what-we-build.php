<?php
/**
 * Template Name: What We Build
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main ww-page">

	<!-- Backdrop 1: hero-bottom-section.png — wraps hero + diagram, ends above key problems -->
	<div class="ww-hero-block">
		<?php
		get_template_part( 'template-parts/what-we-build/hero' );
		get_template_part( 'template-parts/what-we-build/diagram' );
		get_template_part( 'template-parts/what-we-build/key-problems' );
		?>
	</div>

	<?php
	get_template_part( 'template-parts/what-we-build/key-cards' );
	get_template_part( 'template-parts/what-we-build/layers' );
	get_template_part( 'template-parts/what-we-build/systems' );
	?>

	<!-- Backdrop 2: one-system-connected-bg-img.png — connected + value panel + practical -->
	<div class="ww-connected-block">
		<?php
		get_template_part( 'template-parts/what-we-build/connected' );
		get_template_part( 'template-parts/what-we-build/value-panel' );
		get_template_part( 'template-parts/what-we-build/practical' );
		?>
	</div>

	<!-- Backdrop 3: footer-bg-img.png — friction + discipline + final CTA -->
	<div class="ww-footer-block">
		<?php
		get_template_part( 'template-parts/what-we-build/friction' );
		get_template_part( 'template-parts/what-we-build/discipline' );
		get_template_part( 'template-parts/what-we-build/final-cta' );
		?>
	</div>
</main>
<?php
get_footer();
