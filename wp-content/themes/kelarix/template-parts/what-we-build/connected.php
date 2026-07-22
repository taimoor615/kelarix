<?php
/**
 * What We Build: One System, Connected Capabilities — 5-item carousel with prev/next.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Data engineering', 'Makes business data clean, connected, and usable' ),
	2 => array( 'Analytics', 'Turns data into patterns, insight, and performance understanding' ),
	3 => array( 'Dashboards', 'Systems should support how teams actually work, not force the business into unrealistic processes.' ),
	4 => array( 'Automation', 'Moves work through consistent workflows with less manual effort' ),
	5 => array( 'AI assisted systems', 'Supports summaries, recommendations, monitoring, and decision support' ),
);
?>
<section class="section ww-connected">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'ww_conn_badge', 'One System, Connected Capabilities' ); ?></span>
			<h2 class="section__title ww-connected__title">
				<?php k_html( 'ww_conn_heading', 'AI, analytics, automation, data, and soft are<br>work best when they are connected.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'ww_conn_text', 'At Kelarix, these are not separate services. They are connected capabilities used to build systems that improve visibility, decision quality, workflow control, and execution.' ); ?>
			</p>
		</div>

		<div class="ww-connected__carousel" data-carousel>
			<div class="ww-connected__track" data-carousel-track>
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'ww_conn_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
					?>
					<article class="ww-cap-card">
						<span class="ww-cap-card__num">0<?php echo $i; ?></span>
						<h3 class="ww-cap-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="ww-cap-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endfor; ?>
			</div>
			<div class="ww-connected__controls">
				<div class="ww-connected__nav">
					<button class="carousel-btn" data-carousel-prev aria-label="Previous">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
					</button>
					<button class="carousel-btn carousel-btn--play" data-carousel-next aria-label="Next">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</button>
				</div>
				<div class="ww-connected__progress"><span data-carousel-progress></span></div>
				<div class="ww-connected__count">1/5</div>
			</div>
		</div>
	</div>
</section>
