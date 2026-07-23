<?php
/**
 * What We Build: Key Problems cards grid (5 cards + 1 CTA card) — on light gradient.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Scattered data', 'Important business data sits across different tools, teams, files, and systems.', 'scatter' ),
	2 => array( 'Manual workflows', 'Approvals, reporting, tracking, and follow ups still depend on repeated human effort.', 'workflow' ),
	3 => array( 'Limited visibility', 'Leadership cannot easily see performance, bottlenecks, risks, and exceptions in one place.', 'clock' ),
	4 => array( 'Slow decisions', 'Teams have data, but it is not always structured, trusted, or timely enough to support action.', 'ai' ),
	5 => array( 'Systems that do not scale', 'Processes that worked at a smaller stage begin to break as the business grows.', 'clipboard' ),
);
?>
<section class="section ww-key-cards">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'ww_keys_badge', 'Key Problems' ); ?></span>
			<h2 class="section__title ww-key-cards__title">
				<?php k_html( 'ww_keys_heading', 'What is Key Problems' ); ?>
			</h2>
		</div>

		<div class="ww-key-cards__grid">
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card  = k_field( 'ww_key_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				$icon  = $card['icon'] ?? $defaults[ $i ][2];
				?>
				<article class="ww-key-card">
					<span class="ww-key-card__icon"><?php echo k_icon_render( $icon, $defaults[ $i ][2] ); ?></span>
					<h3 class="ww-key-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="ww-key-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endfor; ?>

			<?php
			$cta      = k_field( 'ww_keys_cta', array() );
			$cta_text = ! empty( $cta['title'] ) ? $cta['title'] : 'Request a Diagnostic Conversation';
			$cta_url  = ! empty( $cta['url'] ) ? $cta['url'] : '#contact';
			?>
			<a class="ww-key-card ww-key-card--cta" href="<?php echo esc_url( $cta_url ); ?>">
				<span class="ww-key-card__cta-text"><?php echo esc_html( $cta_text ); ?></span>
				<span class="ww-key-card__cta-chevron" aria-hidden="true">
					<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
				</span>
			</a>
		</div>
	</div>
</section>
