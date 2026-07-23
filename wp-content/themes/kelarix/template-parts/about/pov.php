<?php
/**
 * About: Our Point of View (auto-play carousel).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Business problems come before technology', 'The right system starts with understanding the operational problem, not choosing a tool first.', 'clipboard' ),
	2 => array( 'Data must be reliable before intelligence can work', 'Analytics, dashboards, automation, and AI need clean, connected, trustworthy data.', 'scatter' ),
	3 => array( 'Workflows must reflect real operations', 'Systems succeed when they match how teams actually work, not how they should work in theory.', 'workflow' ),
	4 => array( 'Dashboards should support decisions', 'Reporting only creates value when it changes what leadership decides and what teams do next.', 'clock' ),
	5 => array( 'Automation should improve control', 'Automation must simplify oversight, reduce exceptions, and give leadership tighter operating control.', 'ai' ),
);
?>
<section class="section about-pov">
	<div class="container">
		<div class="about-pov__head">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'pov_badge', 'Our Point of View' ); ?></span>
			<h2 class="section__title section__title--light about-pov__title">
				<?php k_html( 'pov_heading', 'Technology only creates value when it improves<br>how the business runs.' ); ?>
			</h2>
			<p class="about-pov__text">
				<?php k_text( 'pov_text', 'We believe better systems start with understanding the business problem, not choosing the tool first. Dashboards, automation, AI, analytics, and software only matter when they improve visibility, decisions, workflows, and execution.' ); ?>
			</p>
		</div>

		<div class="about-pov__carousel" data-carousel>
			<div class="about-pov__track" data-carousel-track>
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'pov_card_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
					$icon  = $card['icon'] ?? $defaults[ $i ][2];
					?>
					<article class="pov-card">
						<span class="pov-card__icon"><?php echo k_icon_render( $icon, $defaults[ $i ][2] ); ?></span>
						<h3 class="pov-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="pov-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endfor; ?>
			</div>

			<div class="about-pov__controls">
				<div class="about-pov__nav">
					<button class="carousel-btn" data-carousel-prev aria-label="Previous">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
					</button>
					<button class="carousel-btn carousel-btn--play" data-carousel-next aria-label="Next">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</button>
				</div>
				<div class="about-pov__progress"><span data-carousel-progress></span></div>
			</div>
		</div>
	</div>
</section>
