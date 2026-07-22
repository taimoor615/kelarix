<?php
/**
 * What We Build: Diagram (unified data central + 4 nodes around).
 *
 * @package Kelarix
 */
$diagram_img = k_image_url( 'ww_diagram_image', KELARIX_URI . '/assets/images/what-we-build/second-section-img.svg', 'full' );
?>
<section class="section ww-diagram">
	<div class="container">
		<div class="ww-diagram__wrap">
			<img src="<?php echo esc_url( $diagram_img ); ?>" alt="<?php echo esc_attr( k_field( 'ww_diagram_alt', 'Kelarix unified data + capabilities diagram' ) ); ?>" class="ww-diagram__img">
		</div>
	</div>
</section>
