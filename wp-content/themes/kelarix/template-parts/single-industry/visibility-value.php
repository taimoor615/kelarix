<?php
/**
 * Single Industry: Visibility creates value (split aside + right list of layers).
 *
 * @package Kelarix
 */
$defaults = array(
	1 => array( 'Data Foundation', 'A single trusted layer where inventory, sales, customer, channel and margin data become usable.' ),
	2 => array( 'Intelligence Layer', 'Clean dashboards, metrics, and structured reporting that leadership can rely on.' ),
	3 => array( 'Workflow Layer', 'Approvals, exceptions, stock movements, and operations built into structured processes.' ),
	4 => array( 'AI-Assisted Support', 'Practical AI support for monitoring, prioritisation, and decision help — not hype.' ),
	5 => array( 'Role-Based Interface', 'Interfaces tuned for store managers, regional heads, merchandising and central operations.' ),
);
?>
<section class="section sind-visibility">
	<div class="container sind-visibility__inner">
		<div class="sind-visibility__aside">
			<span class="badge badge--soft"><span class="dot"></span><?php k_text( 'sind_vis_badge', 'How Retail Systems Come Together' ); ?></span>
			<h2 class="section__title sind-visibility__title">
				<?php k_html( 'sind_vis_heading', 'Visibility creates value when<br>it is connected to action.' ); ?>
			</h2>
			<p class="sind-visibility__text">
				<?php k_text( 'sind_vis_text', 'A retail leadership system is not a dashboard alone. It is the layered combination of data, intelligence, workflow, roles and interfaces that make execution easier.' ); ?>
			</p>
			<div class="sind-visibility__actions">
				<?php
				k_button( 'sind_vis_cta_primary', 'Request a Diagnostic Conversation', '#contact', 'btn btn--primary' );
				k_button( 'sind_vis_cta_secondary', 'Explore What We Build', '#systems', 'btn btn--ghost' );
				?>
			</div>
		</div>

		<div class="sind-visibility__list">
			<?php for ( $i = 1; $i <= 5; $i++ ) :
				$card  = k_field( 'sind_vis_layer_' . $i, array() );
				$title = ! empty( $card['title'] ) ? $card['title'] : $defaults[ $i ][0];
				$text  = ! empty( $card['text'] ) ? $card['text'] : $defaults[ $i ][1];
				?>
				<article class="sind-vis-item">
					<span class="sind-vis-item__num"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3 class="sind-vis-item__title"><?php echo esc_html( $title ); ?></h3>
					<p class="sind-vis-item__text"><?php echo esc_html( $text ); ?></p>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
