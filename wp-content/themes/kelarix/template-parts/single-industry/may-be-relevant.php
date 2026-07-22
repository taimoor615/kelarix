<?php
/**
 * Single Industry: Kelarix may be relevant — 5-card carousel with check icons.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Leadership cannot get one reliable view of demand, availability, and distribution.' ),
	2 => array( 'Distributor reports arrive late or use inconsistent definitions.' ),
	3 => array( 'Stockouts and excess inventory are identified after they affect performance.' ),
	4 => array( 'Commercial, supply, production, and finance teams work from different information.' ),
	5 => array( 'Reporting depends heavily on spreadsheets and manual consolidation.' ),
);
?>
<section class="section sind-relevant">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'sind_rel_badge', 'When Businesses Need Kelarix' ); ?></span>
			<h2 class="section__title section__title--light sind-relevant__title">
				<?php k_html( 'sind_rel_heading', 'Kelarix may be relevant when growth is<br>making the value chain harder to control.' ); ?>
			</h2>
			<p class="sind-relevant__text">
				<?php k_text( 'sind_rel_text', 'You may not need another reporting tool. You may need a clearer system for connecting demand, distribution, inventory, production, quality, and action.' ); ?>
			</p>
		</div>

		<div class="sind-relevant__carousel" data-carousel>
			<div class="sind-relevant__track" data-carousel-track>
				<?php for ( $i = 1; $i <= 5; $i++ ) :
					$card  = k_field( 'sind_rel_' . $i, array() );
					$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
					?>
					<article class="sind-rel-card">
						<span class="sind-rel-card__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>
						</span>
						<p class="sind-rel-card__title"><?php echo esc_html( $title ); ?></p>
					</article>
				<?php endfor; ?>
			</div>
			<div class="sind-relevant__controls">
				<div class="sind-relevant__nav">
					<button class="carousel-btn" data-carousel-prev aria-label="Previous">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6l-6 6 6 6"/></svg>
					</button>
					<button class="carousel-btn carousel-btn--play" data-carousel-next aria-label="Next">
						<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
					</button>
				</div>
				<div class="sind-relevant__progress"><span data-carousel-progress></span></div>
			</div>
		</div>
	</div>
</section>
