<?php
/**
 * Template Name: About Us
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main about-page">
	<?php
	get_template_part( 'template-parts/about/hero' );
	get_template_part( 'template-parts/about/why' );
	get_template_part( 'template-parts/about/pov' );
	get_template_part( 'template-parts/about/strategy' );
	get_template_part( 'template-parts/about/path' );
	get_template_part( 'template-parts/about/discipline' );
	get_template_part( 'template-parts/about/different' );
	get_template_part( 'template-parts/about/final-cta' );
	?>
</main>
<?php
get_footer();
