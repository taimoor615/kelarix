<?php
/**
 * What We Build: Operational Friction — 2 opposing marquee rows with icon cards.
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Leadership cannot get a reliable view of performance', 'workflow' ),
	2 => array( 'Teams spend too much time preparing reports manually', 'clipboard' ),
	3 => array( 'Data exists, but it is scattered, duplicated, or hard to trust', 'scatter' ),
	4 => array( 'Workflows depend on emails, spreadsheets, and follow ups', 'clock' ),
	5 => array( 'Existing tools do not match business actions', 'ai' ),
	6 => array( 'The business is growing, but systems are not scaling with it', 'store' ),
	7 => array( 'Decisions delayed by incomplete data', 'shield' ),
	8 => array( 'Teams are working hard, but execution is difficult to monitor', 'health' ),
);
$row1 = array( 1, 2, 3, 4 );
$row2 = array( 5, 6, 7, 8 );

$render_tile = function( $i, $defaults ) {
	$card  = k_field( 'ww_fric_' . $i, array() );
	$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
	$icon  = $card['icon'] ?? $defaults[ $i ][1];
	?>
	<article class="ww-fric-card">
		<span class="ww-fric-card__icon"><?php echo k_icon_render( $icon, $defaults[ $i ][1] ); ?></span>
		<h3 class="ww-fric-card__title"><?php echo esc_html( $title ); ?></h3>
	</article>
	<?php
};
?>
<section class="section ww-friction">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--dashed badge--center"><span class="dot"></span><?php k_text( 'ww_fric_badge', 'When Businesses Need Kelarix' ); ?></span>
			<h2 class="section__title section__title--light ww-friction__title">
				<?php k_html( 'ww_fric_heading', 'You may need Kelarix when growth<br>starts creating operational friction.' ); ?>
			</h2>
			<p class="section__lead section__lead--light">
				<?php k_text( 'ww_fric_text', "Businesses often do not need another tool. They need a clearer system for how data, workflows, decisions, and execution connect." ); ?>
			</p>
		</div>
	</div>

	<div class="ww-friction__marquees">
		<div class="marquee marquee--right">
			<div class="marquee__track">
				<?php foreach ( $row1 as $i ) { $render_tile( $i, $defaults ); } ?>
				<?php foreach ( $row1 as $i ) { $render_tile( $i, $defaults ); } ?>
				<?php foreach ( $row1 as $i ) { $render_tile( $i, $defaults ); } ?>
			</div>
		</div>
		<div class="marquee marquee--left">
			<div class="marquee__track">
				<?php foreach ( $row2 as $i ) { $render_tile( $i, $defaults ); } ?>
				<?php foreach ( $row2 as $i ) { $render_tile( $i, $defaults ); } ?>
				<?php foreach ( $row2 as $i ) { $render_tile( $i, $defaults ); } ?>
			</div>
		</div>
	</div>
</section>
