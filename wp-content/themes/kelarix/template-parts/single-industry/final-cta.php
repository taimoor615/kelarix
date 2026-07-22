<?php
/**
 * Single Industry: Final CTA panel.
 *
 * @package Kelarix
 */
?>
<section class="section final-cta sind-final-cta">
	<div class="container">
		<div class="final-cta__panel">
			<div class="final-cta__inner">
				<h2 class="final-cta__title">
					<?php k_html( 'sind_final_heading', "Let's identify where better systems can improve visibility, decisions, and execution." ); ?>
				</h2>
				<p class="final-cta__text">
					<?php k_text( 'sind_final_text', 'If your retail business is growing but performance visibility, workflows, decisions, and margins are getting harder to control, Kelarix can help you diagnose where a clearer operating system could add leverage.' ); ?>
				</p>
				<div class="final-cta__actions">
					<?php
					k_button( 'sind_final_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
					k_button( 'sind_final_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
					?>
				</div>
			</div>
			<div class="final-cta__decor" aria-hidden="true"></div>
		</div>
	</div>
</section>
