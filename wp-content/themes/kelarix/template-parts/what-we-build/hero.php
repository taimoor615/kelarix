<?php
/**
 * What We Build: Hero.
 *
 * @package Kelarix
 */
$hero_image = k_image_url( 'ww_hero_image', KELARIX_URI . '/assets/images/what-we-build/hero-section-img.png', 'full' );
?>
<section class="hero ww-hero">
	<div class="hero__bg" style="background-image:url('<?php echo esc_url( $hero_image ); ?>');"></div>
	<div class="hero__overlay"></div>
	<div class="container">
		<div class="hero__inner ww-hero__inner">
			<p class="eyebrow eyebrow--chip">
				<span class="eyebrow__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
				</span>
				<?php k_text( 'ww_hero_eyebrow', 'Kelarix builds business systems for leaders' ); ?>
			</p>

			<h1 class="hero__title ww-hero__title">
				<?php k_html( 'ww_hero_heading', 'We build the systems that help businesses see, decide, and execute better.' ); ?>
			</h1>

			<p class="hero__subtext">
				<?php k_text( 'ww_hero_subtext', 'Kelarix designs and builds data driven business systems that connect operations, data, workflows, intelligence, and software into one practical operating layer.' ); ?>
			</p>

			<div class="hero__actions">
				<?php
				k_button( 'ww_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'ww_hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
				?>
			</div>

			<p class="hero__note">
				<span class="hero__note-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
				</span>
				<?php k_text( 'ww_hero_note', 'Built for leadership teams managing complex systems, data, and growing execution pressure.' ); ?>
			</p>
		</div>
	</div>
</section>
