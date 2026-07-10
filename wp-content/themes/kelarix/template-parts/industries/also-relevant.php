<?php
/**
 * Industries: Also relevant for other complex operating environments.
 *
 * @package Kelarix
 */
$icons = array(
	'truck' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="6" width="14" height="10" rx="1"/><path d="M15 9h4l3 3v4h-7M6 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4zM18 20a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>',
	'gear'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19 12a7 7 0 0 0-.1-1l2-1.6-2-3.4-2.4 1a7 7 0 0 0-1.7-1l-.4-2.5h-4l-.4 2.5a7 7 0 0 0-1.7 1l-2.4-1-2 3.4 2 1.6a7 7 0 0 0 0 2l-2 1.6 2 3.4 2.4-1a7 7 0 0 0 1.7 1l.4 2.5h4l.4-2.5a7 7 0 0 0 1.7-1l2.4 1 2-3.4-2-1.6c.07-.32.1-.66.1-1z"/></svg>',
	'home'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12l9-9 9 9M5 10v10h14V10"/></svg>',
	'bolt'  => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2L4 14h7l-1 8 9-12h-7l1-8z"/></svg>',
);
$defaults = array(
	1 => array( 'Logistics and Supply Chain', 'Relevant for shipment visibility, warehouse workflows, delivery exceptions, and operational tracking.', 'truck' ),
	2 => array( 'Manufacturing', 'Relevant for production visibility, downtime tracking, quality workflows, and process control.', 'gear' ),
	3 => array( 'Real Estate and Construction', 'Relevant for project visibility, cost tracking, approvals, documents, and stakeholder coordination.', 'home' ),
	4 => array( 'Energy and Utilities', 'Relevant for asset visibility, maintenance workflows, usage monitoring, and operational reporting.', 'bolt' ),
);
?>
<section class="section industries-also">
	<div class="container">
		<h2 class="industries-also__title">
			<?php k_html( 'also_heading', 'Also relevant for other complex operating<br>environments.' ); ?>
		</h2>

		<div class="industries-also__grid">
			<?php foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'also_item_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $item[1];
				$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $item[2];
				$svg   = isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['gear'];
				?>
				<a class="also-card" href="#">
					<span class="also-card__icon"><?php echo $svg; // phpcs:ignore ?></span>
					<span class="also-card__chevron" aria-hidden="true">
						<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M9 7h8v8"/></svg>
					</span>
					<h3 class="also-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="also-card__text"><?php echo esc_html( $text ); ?></p>
				</a>
			<?php endforeach; ?>
		</div>

		<div class="industries-also__actions">
			<?php
			k_button( 'also_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
			k_button( 'also_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
			?>
		</div>
	</div>
</section>
