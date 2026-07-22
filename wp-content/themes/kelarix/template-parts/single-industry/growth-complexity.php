<?php
/**
 * Single Industry: Growth complexity (dark panel + 5 pattern cards + CTA card).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'More channels, less consistency', 'Stores, ecommerce, marketplaces, and channel partners bring more surface area and more performance friction.', 'scatter' ),
	2 => array( 'Inventory spread across the business', 'Stock sits across locations, warehouses, channels, systems, and reporting tools.', 'clipboard' ),
	3 => array( 'Margin pressure is harder to explain', 'Discounts, promotions, returns, and channel mix quietly reshape margins in ways leadership cannot always see.', 'ai' ),
	4 => array( 'Reporting becomes labour intensive', 'Teams spend hours collecting, cleaning and preparing information before decisions can happen.', 'clock' ),
	5 => array( 'Execution becomes difficult to track', 'Operational actions may be needed, but reporting is not delivered until through several review cycles.', 'workflow' ),
);
?>
<section class="section section--dark sind-growth">
	<div class="container">
		<div class="sind-growth__panel">
			<div class="sind-growth__head">
				<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'sind_grow_badge', 'Retail Operating Pressure' ); ?></span>
				<h2 class="section__title section__title--light">
					<?php k_html( 'sind_grow_heading', 'Retail growth creates complexity<br>across every operating layer.' ); ?>
				</h2>
				<p class="sind-growth__text">
					<?php k_text( 'sind_grow_text', 'As retailers expand across stores, ecommerce, products, regions, and customer touchpoints, operating visibility becomes harder to maintain.' ); ?>
				</p>
				<p class="sind-growth__text">
					<?php k_text( 'sind_grow_text_2', 'Data spreads across systems, workflows become more manual, and important issues are often identified too late.' ); ?>
				</p>
			</div>

			<div class="sind-growth__grid">
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'sind_grow_card_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
					$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $defaults[ $i ][2];
					$corner = ( 1 === $i % 2 ) ? 'problem-card--br' : 'problem-card--tl';
					?>
					<article class="problem-card <?php echo esc_attr( $corner ); ?>">
						<span class="problem-card__icon"><?php echo k_icon( $icon ); ?></span>
						<h3 class="problem-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="problem-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endfor; ?>

				<?php
				$cta      = k_field( 'sind_grow_cta', array() );
				$cta_text = ! empty( $cta['title'] ) ? $cta['title'] : 'Request a Diagnostic Conversation';
				$cta_url  = ! empty( $cta['url'] ) ? $cta['url'] : '#contact';
				?>
				<a class="problem-card problem-card--cta" href="<?php echo esc_url( $cta_url ); ?>">
					<span class="problem-card__cta-text"><?php echo esc_html( $cta_text ); ?></span>
					<span class="problem-card__cta-chevron" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</span>
				</a>
			</div>

			<div class="sind-growth__quote">
				<p><?php k_text( 'sind_grow_quote', 'Retail leaders do not need more disconnected reports. They need a clearer operating view of the business.' ); ?></p>
			</div>
		</div>
	</div>
</section>
