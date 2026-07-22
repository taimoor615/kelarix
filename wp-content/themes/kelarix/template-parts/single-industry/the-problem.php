<?php
/**
 * Single Industry: "The problem is rarely a lack of data" + visibility-gap carousel.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Store and Channel Performance', 'Performance is difficult to compare consistently cross stores, regions, ecommerce, marketplaces, and other channels.', 'store' ),
	2 => array( 'Inventory Position', 'Stock availability, movement, ageing, replenishment, and inventory risk are not always visible in one trusted view.', 'basket' ),
	3 => array( 'Sales and Margin Clarity', 'Revenue may be visible, but the factors affecting margin quality are often scattered across teams and systems.', 'ai' ),
	4 => array( 'Returns and Refunds', 'Returns create operational, financial, inventory, and customer-service complexity that can be difficult to track end to end.', 'workflow' ),
	5 => array( 'Customer and Product Performance', 'Customer, product, promotion, and channel data often sits inside tools, limiting commercial visibility.', 'scatter' ),
);
?>
<section class="section sind-problem">
	<div class="container">
		<div class="sind-problem__inner">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'sind_problem_badge', 'Where Leadership Loses Visibility' ); ?></span>
			<h2 class="section__title section__title--light sind-problem__title">
				<?php k_html( 'sind_problem_heading', 'The problem is rarely a lack of data. It is the<br>lack of one reliable operating view.' ); ?>
			</h2>
			<p class="sind-problem__text">
				<?php k_text( 'sind_problem_text', 'Performance is difficult to compare consistently across stores, regions, ecommerce, marketplaces, and other channels.' ); ?>
			</p>
		</div>

		<div class="sind-problem__carousel" data-carousel>
			<div class="sind-problem__track" data-carousel-track>
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'sind_gap_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
					$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $defaults[ $i ][2];
					?>
					<article class="sind-gap-card">
						<span class="sind-gap-card__icon"><?php echo k_icon( $icon ); ?></span>
						<h3 class="sind-gap-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="sind-gap-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endfor; ?>
			</div>
			<div class="sind-problem__controls">
				<div class="sind-problem__nav">
					<button class="carousel-btn" data-carousel-prev aria-label="Previous">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
					</button>
					<button class="carousel-btn carousel-btn--play" data-carousel-next aria-label="Next">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</button>
				</div>
				<div class="sind-problem__progress"><span data-carousel-progress></span></div>
			</div>
		</div>
	</div>
</section>
