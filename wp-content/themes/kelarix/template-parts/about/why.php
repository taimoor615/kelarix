<?php
/**
 * About: Why Kelarix Exists.
 *
 * @package Kelarix
 */
?>
<section class="section about-why">
	<div class="container">
		<div class="about-why__inner">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'why_badge', 'Why Kelarix Exists' ); ?></span>

			<h2 class="section__title section__title--light about-why__title">
				<?php k_html( 'why_heading', 'Businesses are growing faster than<br>their systems can support.' ); ?>
			</h2>

			<div class="about-why__body">
				<p><?php k_text( 'why_text_1', 'Many companies are using more tools than ever, but still struggle with scattered data, manual workflows, slow reporting, unclear ownership, and limited visibility across operations.' ); ?></p>
				<p><?php k_text( 'why_text_2', 'As the business grows, these gaps become harder for leadership to control. Decisions slow down. Teams spend more time preparing information than using it. Processes depend on manual effort. Systems stop matching how the business actually works.' ); ?></p>
				<p><?php k_text( 'why_text_3', 'Kelarix exists to help businesses turn that complexity into clearer, more reliable operating systems.' ); ?></p>
			</div>

			<div class="about-why__quote">
				<p><?php k_text( 'why_quote', 'The goal is not more technology. The goal is better business control.' ); ?></p>
			</div>

			<div class="about-why__after" aria-hidden="true">
				<img src="<?php echo esc_url( KELARIX_URI . '/assets/images/about-us/goal-after-section-img.svg' ); ?>" alt="">
			</div>
		</div>
	</div>
</section>
