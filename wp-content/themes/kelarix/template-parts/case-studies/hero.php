<?php
/**
 * Case Studies page: hero section.
 *
 * @package Kelarix
 */
?>
<section class="hero cs-hero">
	<div class="container">
		<div class="hero__inner cs-hero__inner">
			<p class="eyebrow eyebrow--chip">
				<span class="eyebrow__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M12 2l2.6 6.4L21 9l-5 4.4L17.4 20 12 16.8 6.6 20 8 13.4 3 9l6.4-.6z"/></svg>
				</span>
				<?php k_text( 'cs_hero_badge', 'Kelarix Proof Library' ); ?>
			</p>

			<h1 class="hero__title cs-hero__title">
				<?php k_html( 'cs_hero_heading', 'Proof of how we think about complex operations.' ); ?>
			</h1>

			<p class="hero__subtext cs-hero__text">
				<?php k_text( 'cs_hero_text', 'Explore scenario-based systems, workflow concepts, intelligence models, diagnostic frameworks, executive briefs, and maturity maps developed around common operating challenges in Retail, FMCG and Food & Beverage, Financial Services, and Healthcare.' ); ?>
			</p>

			<div class="hero__actions">
				<?php
				k_button( 'cs_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'cs_hero_cta_secondary', 'Explore What We Build', '#grid', 'btn btn--white' );
				?>
			</div>

			<p class="hero__note">
				<span class="hero__note-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
				</span>
				<?php k_text( 'cs_hero_note', 'Built for growing retail operations.' ); ?>
			</p>
		</div>
	</div>
</section>
