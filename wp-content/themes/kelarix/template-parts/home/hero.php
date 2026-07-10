<?php
/**
 * Section: Hero.
 *
 * @package Kelarix
 */
$hero_image = k_image_url( 'hero_image', KELARIX_URI . '/assets/images/hero-building.png', 'full' );
?>
<section class="hero">
	<!-- <div class="hero__bg" style="background-image:url('<?php //echo esc_url( $hero_image ); ?>');"></div> -->
	<div class="hero__overlay"></div>
	<div class="container">
	<div class="hero__inner">
		<p class="eyebrow eyebrow--chip">
			<span class="eyebrow__icon" aria-hidden="true">
				<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
			</span>
			<?php k_text( 'hero_eyebrow', 'Strategy led. Engineering backed. Built for operational clarity' ); ?>
		</p>

		<h1 class="hero__title">
			<?php k_html( 'hero_heading', 'Systems that help leaders see clearly, decide faster, and execute with control.' ); ?>
		</h1>

		<p class="hero__subtext">
			<?php k_text( 'hero_subtext', 'Kelarix designs and builds data driven systems that turn scattered data, manual workflows, and operational complexity into better business visibility and execution.' ); ?>
		</p>

		<div class="hero__actions">
			<?php
			k_button( 'hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
			k_button( 'hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
			?>
		</div>

		<p class="hero__note">
			<span class="hero__note-icon" aria-hidden="true">
				<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
			</span>
			<?php k_text( 'hero_note', 'For businesses operating in complex, high pressure industries.' ); ?>
		</p>
	</div>
	</div>
</section>
