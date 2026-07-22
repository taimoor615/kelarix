<?php
/**
 * What We Build: Layers (split aside + right list of business layers).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Business Operations', 'We understand workflows, roles, bottlenecks, decisions, reporting needs, and operating structure.' ),
	2 => array( 'Data Foundation', 'We connect, clean, structure, and organise business data so it becomes usable and reliable.' ),
	3 => array( 'Intelligence Layer', 'We create dashboards, analytics, alerts, monitoring, and decision support for leadership and teams.' ),
	4 => array( 'Workflow Layer', 'We automate approvals, routing, tasks, exceptions, notifications, and operational triggers.' ),
	5 => array( 'Software Interface', 'We build internal tools, portals, admin systems, and role based platforms that teams actually use.' ),
	6 => array( 'Improvement Layer', 'We refine systems based on adoption, feedback, performance, and changing business needs.' ),
);
?>
<section class="section ww-layers">
	<div class="container ww-layers__inner">
		<div class="ww-layers__aside">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'ww_layers_badge', 'Our System Model' ); ?></span>
			<h2 class="section__title ww-layers__title">
				<?php k_html( 'ww_layers_heading', 'We connect the layers a business needs to operate with clarity.' ); ?>
			</h2>
			<p class="ww-layers__text">
				<?php k_text( 'ww_layers_text', 'Kelarix works with technology, but we do not build technology in isolation. We start from the business layer and connect every capability the business needs to run cleanly.' ); ?>
			</p>
			<div class="ww-layers__actions">
				<?php
				k_button( 'ww_layers_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'ww_layers_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
				?>
			</div>
		</div>

		<div class="ww-layers__list">
			<?php for ( $i = 1; $i <= 6; $i++ ) :
				$card  = k_field( 'ww_layer_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				?>
				<article class="ww-layer-item">
					<span class="ww-layer-item__num"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="ww-layer-item__title"><?php echo esc_html( $title ); ?></h3>
					<p class="ww-layer-item__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
