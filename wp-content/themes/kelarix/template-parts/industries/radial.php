<?php
/**
 * Industries: Radial industry diagram — single decorative image.
 *
 * @package Kelarix
 */
$radial_img = k_image_url( 'radial_image', KELARIX_URI . '/assets/images/industry/industries-img.svg', 'full' );
?>
<section class="section industries-radial">
	<div class="container">
		<div class="radial">
			<img src="<?php echo esc_url( $radial_img ); ?>" alt="<?php echo esc_attr( k_field( 'radial_alt', 'Kelarix industries diagram' ) ); ?>" class="radial__img">
		</div>
	</div>
</section>
