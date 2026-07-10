<?php
/**
 * About: Point of View — head (badge + heading + description).
 * Rendered inside the about-hero-block wrapper.
 *
 * @package Kelarix
 */
?>
<div class="about-pov__head">
	<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'pov_badge', 'Our Point of View' ); ?></span>
	<h2 class="section__title section__title--light about-pov__title">
		<?php k_html( 'pov_heading', 'Technology only creates value when it improves<br>how the business runs.' ); ?>
	</h2>
	<p class="about-pov__text">
		<?php k_text( 'pov_text', 'We believe better systems start with understanding the business problem, not choosing the tool first. Dashboards, automation, AI, analytics, and software only matter when they improve visibility, decisions, workflows, and execution.' ); ?>
	</p>
</div>
