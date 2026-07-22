<?php
/**
 * Single Industry: Hero with right-side illustration.
 *
 * @package Kelarix
 */
$hero_bg     = k_image_url( 'sind_hero_bg', KELARIX_URI . '/assets/images/single-page-industry/hero-section-bg-img.png', 'full' );
$right_image = k_image_url( 'sind_hero_right_image', KELARIX_URI . '/assets/images/single-page-industry/hero-right-side-img.png', 'full' );
?>
<section class="hero sind-hero">
	<div class="hero__bg" style="background-image:url('<?php echo esc_url( $hero_bg ); ?>');"></div>
	<div class="hero__overlay"></div>
	<div class="container">
		<div class="sind-hero__row">
			<div class="hero__inner sind-hero__inner">
				<p class="eyebrow eyebrow--chip">
					<span class="eyebrow__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
					</span>
					<?php k_text( 'sind_hero_eyebrow', 'Retail Operating Systems' ); ?>
				</p>

				<h1 class="hero__title sind-hero__title">
					<?php k_html( 'sind_hero_heading', 'See clearly. Protect<br>margins. Stay in control.' ); ?>
				</h1>

				<p class="hero__subtext">
					<?php k_text( 'sind_hero_subtext', 'Kelarix builds retail leadership teams a clearer, calmer, sharper view of inventory, stores, channels, margins, execution and performance so that support teams grow with control.' ); ?>
				</p>

				<div class="hero__actions">
					<?php
					k_button( 'sind_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
					k_button( 'sind_hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
					?>
				</div>

				<p class="hero__note">
					<span class="hero__note-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
					</span>
					<?php k_text( 'sind_hero_note', 'Built for growing retail operations.' ); ?>
				</p>
			</div>

			<div class="sind-hero__aside" aria-hidden="true">
				<img src="<?php echo esc_url( $right_image ); ?>" alt="" class="sind-hero__image">
			</div>
		</div>
	</div>
</section>
