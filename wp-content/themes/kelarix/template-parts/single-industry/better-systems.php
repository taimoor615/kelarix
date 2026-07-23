<?php
/**
 * Single Industry: Better systems / Leadership Outcomes — 2 opposing marquee rows.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Clearer visibility across stores, channels, products, and regions', 'scatter' ),
	2 => array( 'Faster identification of inventory and execution risks', 'shield' ),
	3 => array( 'Better understanding of margin pressure', 'ai' ),
	4 => array( 'Less manual reporting and reconciliation', 'clipboard' ),
	5 => array( 'More structured returns and operational workflows', 'workflow' ),
	6 => array( 'Clearer ownership of issues, exceptions, and actions', 'store' ),
	7 => array( 'More reliable information for planning and decision-making', 'clock' ),
	8 => array( 'Systems that can support continued retail growth', 'health' ),
);
$row1 = array( 1, 2, 3, 4 );
$row2 = array( 5, 6, 7, 8 );

$render_out = function( $i, $defaults ) {
	$card  = k_field( 'sind_out_' . $i, array() );
	$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
	$icon  = $card['icon'] ?? $defaults[ $i ][1];
	?>
	<article class="sind-out-card">
		<span class="sind-out-card__icon"><?php echo k_icon_render( $icon, $defaults[ $i ][1] ); ?></span>
		<h3 class="sind-out-card__title"><?php echo esc_html( $title ); ?></h3>
	</article>
	<?php
};
?>
<section class="section sind-better">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'sind_bet_badge', 'Leadership Outcomes' ); ?></span>
			<h2 class="section__title sind-better__title">
				<?php k_html( 'sind_bet_heading', 'Better systems create stronger retail<br>operating control.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'sind_bet_text', 'The objective is not more technology. It is a clearer, more disciplined way to understand performance and manage execution.' ); ?>
			</p>
		</div>
	</div>

	<div class="sind-better__marquees">
		<div class="marquee marquee--right">
			<div class="marquee__track">
				<?php foreach ( $row1 as $i ) { $render_out( $i, $defaults ); } ?>
				<?php foreach ( $row1 as $i ) { $render_out( $i, $defaults ); } ?>
				<?php foreach ( $row1 as $i ) { $render_out( $i, $defaults ); } ?>
			</div>
		</div>
		<div class="marquee marquee--left">
			<div class="marquee__track">
				<?php foreach ( $row2 as $i ) { $render_out( $i, $defaults ); } ?>
				<?php foreach ( $row2 as $i ) { $render_out( $i, $defaults ); } ?>
				<?php foreach ( $row2 as $i ) { $render_out( $i, $defaults ); } ?>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="sind-better__actions">
			<?php
			k_button( 'sind_bet_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
			k_button( 'sind_bet_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
			?>
		</div>
	</div>
</section>
