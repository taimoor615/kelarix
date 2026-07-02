<?php
/**
 * Section: Growth creates blind spots (problem cards).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Scattered visibility', 'Performance is hard to see across teams, locations, systems, and processes.', 'scatter' ),
	2 => array( 'Manual execution', 'Important work still depends on spreadsheets, emails, follow ups, and repeated human effort.', 'clipboard' ),
	3 => array( 'Slow decision making', 'Data exists, but it is not clean, connected, or timely enough to support action.', 'clock' ),
	4 => array( 'Weak workflow control', 'Ownership, exceptions, and progress are difficult to track across the business.', 'workflow' ),
	5 => array( 'AI readiness gap', 'AI cannot create real value without reliable data, workflow clarity, permissions, and governance.', 'ai' ),
);
?>
<section class="section section--dark blind">
	<div class="container">
		<div class="blind__panel">
			<div class="blind__head">
				<div class="blind__head-left">
					<span class="badge badge--dashed"><span class="dot"></span><?php k_text( 'blind_badge', 'Key Problems' ); ?></span>
					<h2 class="section__title section__title--light">
						<?php k_html( 'blind_heading', 'Growth creates blind spots when systems do not scale with the business.' ); ?>
					</h2>
				</div>
				<p class="blind__head-text">
					<?php k_text( 'blind_text', 'As businesses grow, data spreads across tools, workflows become manual, reporting slows down, and leadership loses the visibility needed to make confident decisions.' ); ?>
				</p>
			</div>

			<div class="blind__grid">
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'blind_card_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
					$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $defaults[ $i ][2];
					// Corner accent alternates: odd cards bottom-right, even cards top-left.
					$corner = ( 1 === $i % 2 ) ? 'problem-card--br' : 'problem-card--tl';
					?>
					<article class="problem-card <?php echo esc_attr( $corner ); ?>">
						<span class="problem-card__icon"><?php echo k_icon( $icon ); ?></span>
						<h3 class="problem-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="problem-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endfor; ?>

				<a class="problem-card problem-card--cta" href="<?php
					$cta = k_field( 'blind_cta', array() );
					echo esc_url( ! empty( $cta['url'] ) ? $cta['url'] : '#contact' );
				?>">
					<span class="problem-card__cta-text">Request a Diagnostic Conversation</span>
					<span class="problem-card__cta-chevron" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</span>
				</a>
			</div>
		</div>
	</div>
</section>
