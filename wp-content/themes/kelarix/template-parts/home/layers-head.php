<?php
/**
 * Layers section — head (badge + heading + description).
 * Rendered inside the hero-block wrapper so the shared backdrop
 * extends down to just before the cards grid.
 *
 * @package Kelarix
 */
?>
<div class="section__head section__head--center">
	<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'layers_badge', 'What Kelarix Does' ); ?></span>
	<h2 class="section__title section__title--light">
		<?php k_html( 'layers_heading', 'We build systems that help leadership teams run the business with more clarity and control.' ); ?>
	</h2>
	<p class="section__lead section__lead--light">
		<?php k_text( 'layers_text', 'Kelarix combines business process understanding, data engineering, analytics, automation, AI readiness, UI and UX, and custom software to design systems around how the business actually operates.' ); ?>
	</p>
</div>
