<?php
/**
 * Section: We build systems... (layers / what Kelarix does).
 *
 * @package Kelarix
 */

// Decorative outline icons (each rendered inside a bordered box on the card).
// Wide cards (1, 2) show 3 boxes: two small + one slightly larger (.lg).
$shield   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/></svg>';
$gear     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="12" r="3"/><path d="M19 12a7 7 0 0 0-.1-1l2-1.6-2-3.4-2.4 1a7 7 0 0 0-1.7-1l-.4-2.5h-4l-.4 2.5a7 7 0 0 0-1.7 1l-2.4-1-2 3.4 2 1.6a7 7 0 0 0 0 2l-2 1.6 2 3.4 2.4-1a7 7 0 0 0 1.7 1l.4 2.5h4l.4-2.5a7 7 0 0 0 1.7-1l2.4 1 2-3.4-2-1.6c.07-.32.1-.66.1-1z"/></svg>';
$building = '<svg class="lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 21V8l8-5 8 5v13M9 21v-6h6v6"/></svg>';
$database = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><ellipse cx="12" cy="6" rx="7" ry="3"/><path d="M5 6v6c0 1.7 3.1 3 7 3s7-1.3 7-3V6M5 12v6c0 1.7 3.1 3 7 3s7-1.3 7-3v-6"/></svg>';
$doc      = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="5" y="3" width="14" height="18" rx="2"/><path d="M8.5 8h7M8.5 12h7M8.5 16h4"/></svg>';
$folder   = '<svg class="lg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>';
$chart    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M4 19V5M4 19h16M8 16l3-4 3 2 4-6"/></svg>';
$sparkle  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="M12 3l1.8 4.2L18 9l-4.2 1.8L12 15l-1.8-4.2L6 9l4.2-1.8z"/></svg>';
$nodes    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="4" width="6" height="5" rx="1.5"/><rect x="15" y="15" width="6" height="5" rx="1.5"/><path d="M9 6.5h4a2 2 0 0 1 2 2v9"/></svg>';
$check    = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="m9 11 3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>';
$code     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><path d="m8 9-4 3 4 3M16 9l4 3-4 3M13 6l-2 12"/></svg>';
$grid     = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 9h18M7 14h6"/></svg>';

$decor = array(
	1 => $shield . $gear . $building,
	2 => $database . $doc . $folder,
	3 => $chart . $sparkle,
	4 => $nodes . $check,
	5 => $code . $grid,
);

$defaults = array(
	1 => array( 'Business operations', 'We understand workflows, roles, bottlenecks, decisions, and reporting needs.' ),
	2 => array( 'Data foundations', 'We connect, clean, structure, and organise business data.' ),
	3 => array( 'Intelligence layer', 'We create dashboards, analytics, alerts, monitoring, and decision support.' ),
	4 => array( 'Workflow layer', 'We automate approvals, routing, tasks, exceptions, and operational triggers.' ),
	5 => array( 'Software layer', 'We build internal tools, portals, admin systems, and role based platforms.' ),
);
?>
<section class="section layers">
	<div class="layers__bg" aria-hidden="true"></div>
	<div class="container layers__inner">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'layers_badge', 'What Kelarix Does' ); ?></span>
			<h2 class="section__title section__title--light">
				<?php k_html( 'layers_heading', 'We build systems that help leadership teams run the business with more clarity and control.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'layers_text', 'Kelarix combines business process understanding, data engineering, analytics, automation, AI readiness, UI and UX, and custom software to design systems around how the business actually operates.' ); ?>
			</p>
		</div>

		<div class="layers__grid">
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card  = k_field( 'layer_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				$icon  = ! empty( $card['icon']['url'] ) ? $card['icon']['url'] : '';
				$wide  = ( $i <= 2 ) ? ' layer-card--wide' : '';
				?>
				<article class="layer-card<?php echo esc_attr( $wide ); ?>">
					<div class="layer-card__body">
						<h3 class="layer-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="layer-card__text"><?php echo esc_html( $text ); ?></p>
					</div>
					<div class="layer-card__decor" aria-hidden="true">
						<?php if ( $icon ) : ?>
							<img src="<?php echo esc_url( $icon ); ?>" alt="" class="layer-card__decor-img" loading="lazy" />
						<?php else : ?>
							<?php echo $decor[ $i ]; // phpcs:ignore ?>
						<?php endif; ?>
					</div>
				</article>
			<?php endfor; ?>
		</div>

		<div class="layers__cta">
			<?php k_button( 'layers_cta', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' ); ?>
		</div>
	</div>
</section>
