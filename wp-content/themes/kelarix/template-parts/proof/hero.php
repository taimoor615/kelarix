<?php
/**
 * Proof: Hero.
 *
 * @package Kelarix
 */
$hero_image = k_image_url( 'proof_hero_image', KELARIX_URI . '/assets/images/proof/hero-img.svg', 'full' );
?>
<section class="hero proof-hero">
	<div class="hero__overlay"></div>
	<div class="container">
		<div class="proof-hero__inner">
			<div class="proof-hero__text">
				<p class="eyebrow eyebrow--chip">
					<span class="eyebrow__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
					</span>
					<?php k_text( 'proof_hero_eyebrow', 'Confidential work. Visible thinking. Practical proof.' ); ?>
				</p>

				<h1 class="hero__title proof-hero__title">
					<?php k_html( 'proof_hero_heading', 'Proof through frameworks, scenarios, and system concepts.' ); ?>
				</h1>

				<p class="hero__subtext">
					<?php k_text( 'proof_hero_subtext', 'Kelarix protects sensitive client work while making our thinking visible through industry pressure maps, diagnostic frameworks, anonymised operating patterns, system concepts, and demo based examples.' ); ?>
				</p>

				<div class="hero__actions">
					<?php
					k_button( 'proof_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
					k_button( 'proof_hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
					?>
				</div>

				<p class="hero__note">
					<span class="hero__note-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
					</span>
					<?php k_text( 'proof_hero_note', 'Built for businesses where operational data, workflows, and internal systems require confidentiality.' ); ?>
				</p>
			</div>

			<div class="proof-hero__visual" aria-hidden="true">
				<img src="<?php echo esc_url( $hero_image ); ?>" alt="">
			</div>
		</div>
	</div>
</section>
