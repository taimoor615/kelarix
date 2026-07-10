<?php
/**
 * Industries: How Kelarix Helps (6 dark blue cards grid).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Operational Intelligence', 'Dashboards, reporting layers, KPI visibility, alerts, and performance monitoring.' ),
	2 => array( 'Data Foundations', 'Pipelines, integrations, data models, quality checks, and structured reporting foundations.' ),
	3 => array( 'Workflow Automation', 'Approvals, task routing, notifications, exception handling, and process automation.' ),
	4 => array( 'AI Assisted Decision Support', 'Summaries, monitoring, recommendations, prioritisation, and decision support inside real workflows.' ),
	5 => array( 'Custom Business Platforms', 'Internal tools, portals, admin systems, and role based platforms designed around real operating needs.' ),
	6 => array( 'Custom Business Platforms', 'Internal tools, portals, admin systems, and role based platforms designed around real operating needs.' ),
);
?>
<section class="section industries-helps">
	<div class="container">
		<div class="section__head section__head--center">
			<span class="badge badge--soft badge--center"><span class="dot"></span><?php k_text( 'helps_badge', 'How Kelarix Helps' ); ?></span>
			<h2 class="section__title industries-helps__title">
				<?php k_html( 'helps_heading', 'We build systems around the operating<br>problems leadership needs to control.' ); ?>
			</h2>
			<p class="section__lead">
				<?php k_text( 'helps_text', 'Kelarix connects business understanding, data engineering, analytics, dashboards, automation, AI readiness, UI and UX, and custom software into systems that help businesses operate with more clarity and discipline.' ); ?>
			</p>
		</div>

		<div class="industries-helps__grid">
			<?php foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'helps_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $item[1];
				$hi    = ( 6 === $i ) ? ' helps-card--hi' : '';
				?>
				<article class="helps-card<?php echo esc_attr( $hi ); ?>">
					<span class="helps-card__num">0<?php echo esc_html( $i ); ?></span>
					<h3 class="helps-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="helps-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
