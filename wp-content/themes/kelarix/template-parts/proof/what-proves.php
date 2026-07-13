<?php
/**
 * Proof: What This Proves (grid of 8 tile cards).
 *
 * @package Kelarix
 */
$icons = array(
	'gauge'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4a8 8 0 1 0 8 8"/><path d="M12 12l5-3"/></svg>',
	'shield'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M9 12l2 2 4-4"/></svg>',
	'layers'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l9 5-9 5-9-5 9-5zM3 13l9 5 9-5M3 17l9 5 9-5"/></svg>',
	'plug'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="8" height="16" rx="1"/><path d="M12 12h8M16 8v8"/></svg>',
	'sketch'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l3 5h6l-4 4 2 6-7-4-7 4 2-6-4-4h6z"/></svg>',
	'lock'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>',
	'msg'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M8 20l4-4h9"/></svg>',
	'chart'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20V4M4 20h16M8 16l3-4 3 2 4-6"/></svg>',
);
$defaults = array(
	1 => array( 'Understand industry operating pressure', 'gauge' ),
	2 => array( 'Diagnose visibility and workflow gaps', 'shield' ),
	3 => array( 'Translate business problems into system requirements', 'layers' ),
	4 => array( 'Connect data, automation, and software.', 'plug' ),
	5 => array( 'Design systems around real workflows and decision needs', 'sketch' ),
	6 => array( 'Plan access, roles, governance, and responsible automation.', 'lock' ),
	7 => array( 'Communicate complex systems in a clear, executive friendly way', 'msg' ),
	8 => array( 'Drive clarity, execution, and growth.', 'chart' ),
);
?>
<section class="section proof-what">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'what_badge', 'What This Proves' ); ?></span>
			<h2 class="section__title proof-what__title">
				<?php k_html( 'what_heading', 'The goal is not to show surface level work.<br>The goal is to show how we think.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'what_text', 'Senior buyers need to know whether a partner can understand the operating problem, structure complexity, design practical systems, and communicate clearly. Our proof model is built to show that capability without exposing confidential client work.' ); ?>
			</p>
		</div>

		<div class="proof-what__grid">
			<?php foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'what_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $item[1];
				$svg   = isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['gauge'];
				?>
				<article class="what-tile">
					<span class="what-tile__icon"><?php echo $svg; // phpcs:ignore ?></span>
					<h3 class="what-tile__title"><?php echo esc_html( $title ); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="proof-what__actions">
			<?php
			k_button( 'what_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
			k_button( 'what_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
			?>
		</div>
	</div>
</section>
