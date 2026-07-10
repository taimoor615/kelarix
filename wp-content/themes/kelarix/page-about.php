<?php
/**
 * Template Name: About Us
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main about-page">

	<!-- Overlay backdrop 1: hero + why + POV head -->
	<div class="about-hero-block">
		<?php
		get_template_part( 'template-parts/about/hero' );
		get_template_part( 'template-parts/about/why' );
		?>

		<section class="section about-pov about-pov--head-only">
			<div class="container">
				<?php get_template_part( 'template-parts/about/pov-head' ); ?>
			</div>
		</section>
	</div>

	<!-- Business-problem backdrop: POV carousel + strategy — pulled up under the overlay -->
	<div class="about-strategy-block">
		<section class="section about-pov about-pov--cards-only">
			<div class="container">
				<?php get_template_part( 'template-parts/about/pov-carousel' ); ?>
			</div>
		</section>

		<?php get_template_part( 'template-parts/about/strategy' ); ?>
	</div>

	<?php
	get_template_part( 'template-parts/about/path' );
	?>

	<!-- Marquee backdrop: wraps the discipline section -->
	<div class="about-marquee-block">
		<?php get_template_part( 'template-parts/about/discipline' ); ?>
	</div>

	<!-- Footer backdrop: wraps 'What Makes Kelarix Different' + Final CTA, closes right before <footer> -->
	<div class="about-footer-block">
		<?php
		get_template_part( 'template-parts/about/different' );
		get_template_part( 'template-parts/about/final-cta' );
		?>
	</div>
</main>
<?php
get_footer();
