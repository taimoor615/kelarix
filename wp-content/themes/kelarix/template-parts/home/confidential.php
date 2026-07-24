<?php
/**
 * Section: Confidential work stays protected (cards).
 *
 * @package Kelarix
 */
$icons = array(
	'book'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M4 5a2 2 0 0 1 2-2h13v16H6a2 2 0 0 0-2 2zM19 19H6a2 2 0 0 1-2-2"/></svg>',
	'node'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l4 4-4 4-4-4z"/><circle cx="12" cy="16" r="3"/></svg>',
	'frame' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 4v16M4 9h16"/></svg>',
	'demo'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="5" width="18" height="13" rx="2"/><path d="M10 9l5 3-5 3z"/></svg>',
	'brief' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M9 8h6M9 12h6M9 16h3"/></svg>',
);
$defaults = array(
	1 => array( 'Scenario Studies', 'Industry problems translated into system thinking and operating logic.', 'book' ),
	2 => array( 'System Concepts', 'Realistic examples of dashboards, workflows, internal tools, and operating layers.', 'node' ),
	3 => array( 'Diagnostic Frameworks', 'Structured methods for identifying visibility gaps, workflow issues, data readiness, and system opportunities.', 'frame' ),
	4 => array( 'Demo Based Proof', 'Visual concepts and future lightweight prototypes that show how systems could work.', 'demo' ),
	5 => array( 'Executive Briefs', 'Business focused thinking around industry pressure, operational complexity, and AI readiness.', 'brief' ),
);
?>
<section class="section confidential">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--light badge--center badge--soft"><span class="dot"></span><?php k_text( 'conf_badge', 'How it work' ); ?></span>
			<h2 class="section__title">
				<?php k_html( 'conf_heading', 'Confidential work stays protected. Expertise stays visible.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'conf_text', 'Much of our work sits inside sensitive operations, data environments, internal workflows, and protected business systems. We do not publicly expose client names, screenshots, testimonials, or confidential project details.' ); ?>
			</p>
			<p class="section__lead">
				<?php k_text( 'conf_text2', 'Instead, we demonstrate our thinking through scenario studies, diagnostic frameworks, system concepts, demo based visuals, and practical operating models.' ); ?>
			</p>
		</div>

		<div class="confidential__grid">
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card      = k_field( 'conf_card_' . $i, array() );
				$title     = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text      = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				$icon_url  = ! empty( $card['icon']['url'] ) ? $card['icon']['url'] : '';
				$icon      = $icon_url ? '' : $icons[ $defaults[ $i ][2] ];
				$corner    = ( 1 === $i % 2 ) ? 'feature-card--br' : 'feature-card--tl';
				?>
				<article class="feature-card <?php echo esc_attr( $corner ); ?>">
					<span class="feature-card__icon">
						<?php if ( $icon_url ) : ?>
							<img src="<?php echo esc_url( $icon_url ); ?>" alt="" class="feature-card__icon-img" loading="lazy" />
						<?php else : ?>
							<?php echo $icon; // phpcs:ignore ?>
						<?php endif; ?>
					</span>
					<h3 class="feature-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="feature-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
