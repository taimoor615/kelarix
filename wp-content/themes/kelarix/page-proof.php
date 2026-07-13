<?php
/**
 * Template Name: Proof
 *
 * @package Kelarix
 */
get_header();
?>
<main id="primary" class="site-main proof-page">
	<div class="proof-top-block">
		<?php
		get_template_part( 'template-parts/proof/hero' );
		get_template_part( 'template-parts/proof/different' );
		?>
	</div>

	<div class="proof-mid-block">
		<?php
		get_template_part( 'template-parts/proof/demonstrate' );
		get_template_part( 'template-parts/proof/case-studies' );
		?>
	</div>

	<?php
	get_template_part( 'template-parts/proof/frameworks' );
	get_template_part( 'template-parts/proof/what-proves' );
	get_template_part( 'template-parts/proof/library' );
	?>

	<div class="proof-footer-block">
		<?php get_template_part( 'template-parts/proof/final-cta' ); ?>
	</div>
</main>
<?php
get_footer();
