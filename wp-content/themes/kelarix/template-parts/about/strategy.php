<?php
/**
 * About: Strategy & Execution (light background, 4 cards).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'We understand the business first', 'Every engagement starts with understanding operations, workflows, data reality, bottlenecks, reporting gaps, and execution pressure.' ),
	2 => array( 'Built around real operating needs', 'The system should support visibility, workflow control, and scalable execution.' ),
	3 => array( 'We build with practical implementation in mind', 'The output must be usable, maintainable, connected to real processes, and clear enough for teams to adopt.' ),
);
?>
<section class="section about-strategy">
	<div class="container">
		<div class="about-strategy__head">
			<div>
				<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'strat_badge', 'Strategy &amp; Engineering-backed' ); ?></span>
				<h2 class="section__title about-strategy__title">
					<?php k_html( 'strat_heading', 'We sit between business<br>strategy and technical<br>execution.' ); ?>
				</h2>
			</div>
			<p class="about-strategy__text">
				<?php k_text( 'strat_text', 'Kelarix goes beyond advice or feature delivery. We understand the operating problem, then design and build practical operating systems using data, analytics, automation, AI readiness, UX, and custom software.' ); ?>
			</p>
		</div>

		<div class="about-strategy__grid">
			<?php for ( $i = 1; $i <= 3; $i++ ) :
				$card  = k_field( 'strat_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				?>
				<article class="strat-card">
					<span class="strat-card__badge" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
					</span>
					<h3 class="strat-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="strat-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endfor; ?>

			<?php
			$cta      = k_field( 'strat_cta', array() );
			$cta_text = ! empty( $cta['title'] ) ? $cta['title'] : 'Request a Diagnostic Conversation';
			$cta_url  = ! empty( $cta['url'] ) ? $cta['url'] : '#contact';
			?>
			<a class="strat-card strat-card--cta" href="<?php echo esc_url( $cta_url ); ?>">
				<span class="strat-card__cta-text"><?php echo esc_html( $cta_text ); ?></span>
				<span class="strat-card__cta-chevron" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
				</span>
			</a>
		</div>
	</div>
</section>
