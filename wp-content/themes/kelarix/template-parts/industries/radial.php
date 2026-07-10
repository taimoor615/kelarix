<?php
/**
 * Industries: Radial industry diagram (KELARIX center + 4 industries around).
 *
 * @package Kelarix
 */
$icons = array(
	'store'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h18l-1 4H4L3 7zM5 11v9h14v-9M10 20v-5h4v5"/></svg>',
	'basket'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 8h18l-2 12H5L3 8zM8 8L12 3l4 5M9 12v4M15 12v4"/></svg>',
	'coin'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><path d="M12 8v8M9 10.5c0-1 1-2 3-2s3 1 3 2c0 2-6 1-6 3 0 1 1 2 3 2s3-1 3-2"/></svg>',
	'health'   => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-8-5-8-11a5 5 0 0 1 9-3 5 5 0 0 1 9 3c0 6-8 11-8 11z"/></svg>',
);
$defaults = array(
	1 => array( 'Retail', 'store' ),
	2 => array( 'FMCG & Food Beverage', 'basket' ),
	3 => array( 'Financial Services', 'coin' ),
	4 => array( 'Healthcare', 'health' ),
);
$labels = array(
	1 => 'Visibility',
	2 => 'Data Quality',
	3 => 'Workflow Control',
	4 => 'Execution Discipline',
);
?>
<section class="section industries-radial">
	<div class="container">
		<div class="radial">
			<span class="radial__label radial__label--top"><?php k_text( 'radial_label_top', $labels[1] ); ?></span>
			<span class="radial__label radial__label--right"><?php k_text( 'radial_label_right', $labels[2] ); ?></span>
			<span class="radial__label radial__label--bottom"><?php k_text( 'radial_label_bottom', $labels[4] ); ?></span>
			<span class="radial__label radial__label--left"><?php k_text( 'radial_label_left', $labels[3] ); ?></span>

			<div class="radial__ring radial__ring--outer" aria-hidden="true"></div>
			<div class="radial__ring radial__ring--inner" aria-hidden="true"></div>

			<div class="radial__center" aria-hidden="true">
				<span class="radial__k">K</span>
			</div>

			<?php foreach ( $defaults as $i => $item ) :
				$card = k_field( 'radial_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$icon  = ! empty( $card['icon'] ) ? $card['icon'] : $item[1];
				$icon_svg = isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['store'];
				?>
				<div class="radial__node radial__node--<?php echo esc_attr( $i ); ?>">
					<span class="radial__node-icon"><?php echo $icon_svg; // phpcs:ignore ?></span>
					<span class="radial__node-label"><?php echo esc_html( $title ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
