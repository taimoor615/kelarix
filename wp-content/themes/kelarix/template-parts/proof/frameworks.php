<?php
/**
 * Proof: Diagnostic Frameworks (split + 5 numbered cards).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Operational Visibility Diagnostic', 'Identifies where leadership lacks a clear view of performance, workflows, exceptions, teams, locations, and operating risk.' ),
	2 => array( 'Data Readiness Diagnostic', 'Assesses whether business data is clean, connected, structured, trusted, and ready for reporting, automation, analytics, or AI.' ),
	3 => array( 'Workflow Automation Opportunity Map', 'Highlights where manual processes, repeated follow ups, unclear ownership, and slow approvals create operational friction.' ),
	4 => array( 'AI Readiness Check', 'Evaluates whether AI can be applied practically and safely based on data quality, workflow clarity, governance, permissions, and decision needs.' ),
	5 => array( 'Execution Control Map', 'Shows where progress, accountability, bottlenecks, and exceptions are difficult for leadership to monitor.' ),
);
?>
<section class="section proof-frameworks">
	<div class="container proof-frameworks__inner">
		<div class="proof-frameworks__aside">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'fw_badge', 'Diagnostic Frameworks' ); ?></span>
			<h2 class="section__title proof-frameworks__title">
				<?php k_html( 'fw_heading', 'Frameworks that reveal<br>where better systems can<br>create leverage.' ); ?>
			</h2>
			<p class="proof-frameworks__text">
				<?php k_text( 'fw_text_1', 'Before building software, dashboards, automation, or AI assisted systems, leadership needs to understand where the operating gaps actually exist.' ); ?>
			</p>
			<p class="proof-frameworks__text">
				<?php k_text( 'fw_text_2', 'Our diagnostic frameworks help identify where visibility, workflows, data, and decisions are breaking down.' ); ?>
			</p>
			<div class="proof-frameworks__actions">
				<?php
				k_button( 'fw_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'fw_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
				?>
			</div>
		</div>

		<div class="proof-frameworks__list">
			<?php foreach ( $defaults as $i => $item ) :
				$card  = k_field( 'fw_card_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $item[0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $item[1];
				?>
				<article class="fw-card">
					<span class="fw-card__num"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="fw-card__title"><?php echo esc_html( $title ); ?></h3>
					<p class="fw-card__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
