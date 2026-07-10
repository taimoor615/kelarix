<?php
/**
 * About: Hero.
 *
 * @package Kelarix
 */
$hero_image = k_image_url( 'about_hero_image', KELARIX_URI . '/assets/images/about-us/about-hero-image.png', 'full' );
?>
<section class="hero about-hero">
	<div class="hero__bg" style="background-image:url('<?php echo esc_url( $hero_image ); ?>');"></div>
	<div class="hero__overlay"></div>
	<div class="container">
		<div class="hero__inner about-hero__inner">
			<p class="eyebrow eyebrow--chip">
				<span class="eyebrow__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
				</span>
				<?php k_text( 'about_hero_eyebrow', 'Built for leaders operating in complex, high pressure industries' ); ?>
			</p>

			<h1 class="hero__title about-hero__title">
				<?php k_html( 'about_hero_heading', 'Built to bring clarity, control, and intelligence to business operations.' ); ?>
			</h1>

			<p class="hero__subtext">
				<?php k_text( 'about_hero_subtext', 'Kelarix builds data driven systems that improve business decisions, workflows, and scalable execution through analytics, automation, AI readiness, UX and custom software.' ); ?>
			</p>

			<div class="hero__actions">
				<?php
				k_button( 'about_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'about_hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
				?>
			</div>

			<p class="hero__note">
				<span class="hero__note-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
				</span>
				<?php k_text( 'about_hero_note', 'For businesses managing complex operations and scattered data.' ); ?>
			</p>
		</div>
	</div>
</section>
