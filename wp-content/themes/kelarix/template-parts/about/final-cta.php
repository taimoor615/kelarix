<?php
/**
 * About: Final CTA panel.
 *
 * @package Kelarix
 */
?>
<section class="section final-cta about-final-cta">
	<div class="container">
		<div class="final-cta__panel">
			<div class="final-cta__inner">
				<h2 class="final-cta__title">
					<?php k_html( 'about_final_heading', "Let's identify where better systems can improve visibility, decisions, and execution." ); ?>
				</h2>
				<p class="final-cta__text">
					<?php k_text( 'about_final_text', 'If your business is growing but reporting, workflows, and decisions are becoming harder to manage, Kelarix can help you diagnose where better systems can create real leverage.' ); ?>
				</p>
				<div class="final-cta__actions">
					<?php
					k_button( 'about_final_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
					k_button( 'about_final_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
					?>
				</div>
			</div>
			<div class="final-cta__decor" aria-hidden="true"></div>
		</div>
	</div>
</section>
