<?php
/**
 * Industries: Hero.
 *
 * @package Kelarix
 */
$hero_image = k_image_url( 'ind_hero_image', KELARIX_URI . '/assets/images/industry/industry-hero-img.png', 'full' );
?>
<section class="hero industries-hero">
	<div class="hero__bg" style="background-image:url('<?php echo esc_url( $hero_image ); ?>');"></div>
	<div class="hero__overlay"></div>
	<div class="container">
		<div class="hero__inner industries-hero__inner">
			<p class="eyebrow eyebrow--chip">
				<span class="eyebrow__icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
				</span>
				<?php k_text( 'ind_hero_eyebrow', 'Built for complex operating environments.' ); ?>
			</p>

			<h1 class="hero__title industries-hero__title">
				<?php k_html( 'ind_hero_heading', 'Industries where visibility, control, and execution matter.' ); ?>
			</h1>

			<p class="hero__subtext">
				<?php k_text( 'ind_hero_subtext', 'Kelarix works with businesses where data, workflows, decisions, and operational performance directly affect growth, margins, compliance, and execution discipline.' ); ?>
			</p>

			<div class="hero__actions">
				<?php
				k_button( 'ind_hero_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'ind_hero_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--white' );
				?>
			</div>

			<p class="hero__note">
				<span class="hero__note-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>
				</span>
				<?php k_text( 'ind_hero_note', 'Focused on industries where better systems create measurable operating leverage.' ); ?>
			</p>
		</div>
	</div>
</section>
