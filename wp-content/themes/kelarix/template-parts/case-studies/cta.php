<?php
/**
 * Case Studies page: bottom CTA panel with checkered decor.
 *
 * @package Kelarix
 */
?>
<section class="section cs-cta">
	<div class="container">
		<div class="cs-cta__panel">
			<div class="cs-cta__body">
				<h2 class="cs-cta__title">
					<?php k_html( 'cs_final_heading', 'Let’s identify where better systems can improve visibility, decisions, and execution.' ); ?>
				</h2>
				<p class="cs-cta__text">
					<?php k_text( 'cs_final_text', 'If your business is growing but reporting, workflows, data, or execution are becoming harder to manage, Kelarix can help you diagnose where better systems can create real leverage.' ); ?>
				</p>
				<div class="cs-cta__actions">
					<?php
					k_button( 'cs_final_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
					k_button( 'cs_final_cta_secondary', 'Explore What We Build', '/what-we-build/', 'btn btn--ghost' );
					?>
				</div>
			</div>
		</div>
	</div>
</section>
